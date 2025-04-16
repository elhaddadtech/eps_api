<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller {
  // 📌 Afficher les services en fonction de la langue
  public function indexByLanguage($lang) {
    // Try to fetch services in the requested language
    $services = Service::whereHas('translations', function ($query) use ($lang) {
      $query->where('language', $lang);
    })->with(['translations' => function ($query) use ($lang) {
      $query->where('language', $lang);
    }])->get();

    // Fallback to 'fr' if no services found
    if ($services->isEmpty()) {
      $lang = 'fr';

      $services = Service::whereHas('translations', function ($query) use ($lang) {
        $query->where('language', $lang);
      })->with(['translations' => function ($query) use ($lang) {
        $query->where('language', $lang);
      }])->get();
    }

    return response()->json($services);
  }

  //show methode by language
  public function show($id, $lang) {
    // Try fetching the service with the requested language
    $services = Service::where('id', $id)
      ->whereHas('translations', function ($query) use ($lang) {
        $query->where('language', $lang);
      })
      ->with(['translations' => function ($query) use ($lang) {
        $query->where('language', $lang);
      }])
      ->get();

    // Fallback to French if no data found
    if ($services->isEmpty() && $lang !== 'fr') {
      $lang = 'fr';

      $services = Service::where('id', $id)
        ->whereHas('translations', function ($query) use ($lang) {
          $query->where('language', $lang);
        })
        ->with(['translations' => function ($query) use ($lang) {
          $query->where('language', $lang);
        }])
        ->get();
    }

    return response()->json($services);
  }

  // 📌 Ajouter un service avec ses traductions
  public function store(Request $request) {
    $validated = $request->validate([
      'icon'                       => 'required|string',
      'translations'               => 'required|array',
      'translations.*.language'    => 'required|in:fr,ar,en',
      'translations.*.name'        => 'required|string',
      'translations.*.description' => 'required|string',
    ]);

    try {
      DB::beginTransaction();

      $service = Service::create(['icon' => $validated['icon']]);

      foreach ($validated['translations'] as $translation) {
        $service->translations()->create($translation);
      }

      DB::commit();

      return response()->json($service->load('translations'), 201);
    } catch (\Exception $e) {
      DB::rollBack();

      return response()->json(['error' => 'Erreur lors de la création du service'], 500);
    }
  }

  // 📌 Mettre à jour un service et ses traductions
  public function update(Request $request, Service $service) {
    $validated = $request->validate([
      'icon'                       => 'sometimes|string',
      'translations'               => 'sometimes|array',
      'translations.*.language'    => 'required|in:fr,ar,en',
      'translations.*.name'        => 'required|string',
      'translations.*.description' => 'required|string',
    ]);

    try {
      DB::beginTransaction();

      if ($request->has('icon')) {
        $service->update(['icon' => $validated['icon']]);
      }

      if ($request->has('translations')) {
        foreach ($validated['translations'] as $translation) {
          $service->translations()->updateOrCreate(
            ['language' => $translation['language']],
            $translation
          );
        }
      }

      DB::commit();

      return response()->json($service->load('translations'));
    } catch (\Exception $e) {
      DB::rollBack();

      return response()->json(['error' => 'Erreur lors de la mise à jour'], 500);
    }
  }

  // 📌 Supprimer un service
  public function destroy(Service $service) {
    $service->delete();

    return response()->json(['message' => 'Service supprimé'], 200);
  }
}
