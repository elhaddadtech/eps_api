<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestinationController extends Controller {
  public function indexByLanguage($lang) {
    $destinations = Destination::whereHas('translations', function ($query) use ($lang) {
      $query->where('language', $lang);
    })->with(['translations' => function ($query) use ($lang) {
      $query->where('language', $lang);
    }])->get();
    if ($destinations->isEmpty()) {
      $lang         = 'fr';
      $destinations = Destination::whereHas('translations', function ($query) use ($lang) {
        $query->where('language', $lang);
      })->with(['translations' => function ($query) use ($lang) {
        $query->where('language', $lang);
      }])->get();
    }

    return response()->json($destinations);
  }

  public function show($id, $lang) {
    $lang = strtolower($lang);

    // Get FAQs in the requested language
    $fqs = Faq::where('destination_id', $id)
      ->where('language', $lang)
      ->orderBy('order_index')
      ->get();

    // Get destination with translations in requested language
    $destinations = Destination::whereHas('translations', function ($query) use ($lang, $id) {
      $query->where('language', $lang)->where('destination_id', $id);
    })->with(['translations' => function ($query) use ($lang, $id) {
      $query->where('language', $lang)->where('destination_id', $id);
    }])->get();

    // If both are empty, fallback to 'fr'
    if ($fqs->isEmpty() && $destinations->isEmpty() && $lang !== 'fr') {
      $lang = 'fr';

      $fqs = Faq::where('destination_id', $id)
        ->where('language', $lang)
        ->orderBy('order_index')
        ->get();

      $destinations = Destination::whereHas('translations', function ($query) use ($lang, $id) {
        $query->where('language', $lang)->where('destination_id', $id);
      })->with(['translations' => function ($query) use ($lang, $id) {
        $query->where('language', $lang)->where('destination_id', $id);
      }])->get();
    }

    return response()->json([
      'Destinations' => $destinations,
      'Fqa'          => $fqs,
    ]);
  }

  public function store(Request $request) {
    $validated = $request->validate([
      'image'                      => 'required|string',
      'translations'               => 'required|array',
      'translations.*.language'    => 'required|in:fr,ar,en',
      'translations.*.name'        => 'required|string',
      'translations.*.description' => 'required|string',
    ]);

    try {
      DB::beginTransaction();

      $destination = Destination::create(['image' => $validated['image']]);

      foreach ($validated['translations'] as $translation) {
        $destination->translations()->create($translation);
      }

      DB::commit();

      return response()->json($destination->load('translations'), 201);
    } catch (\Exception $e) {
      DB::rollBack();

      return response()->json(['error' => 'Erreur lors de la création de la destination'], 500);
    }
  }

  public function update(Request $request, Destination $destination) {
    $validated = $request->validate([
      'image'                      => 'sometimes|string',
      'translations'               => 'sometimes|array',
      'translations.*.language'    => 'required|in:fr,ar,en',
      'translations.*.name'        => 'required|string',
      'translations.*.description' => 'required|string',
    ]);

    try {
      DB::beginTransaction();

      if ($request->has('image')) {
        $destination->update(['image' => $validated['image']]);
      }

      if ($request->has('translations')) {
        foreach ($validated['translations'] as $translation) {
          $destination->translations()->updateOrCreate(
            ['language' => $translation['language']],
            $translation
          );
        }
      }

      DB::commit();

      return response()->json($destination->load('translations'));
    } catch (\Exception $e) {
      DB::rollBack();

      return response()->json(['error' => 'Erreur lors de la mise à jour'], 500);
    }
  }

  public function destroy(Destination $destination) {
    $destination->delete();

    return response()->json(['message' => 'Destination supprimée'], 200);
  }
}
