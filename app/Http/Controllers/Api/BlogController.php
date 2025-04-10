<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller {
  public function index() {
    return response()->json(Blog::with('translations')->get());
  }

  //indexByLanguage
  public function indexByLanguage(Request $request) {
    $lang = $request->lang;

    $blogs = Blog::whereHas('translations', function ($query) use ($lang) {
      $query->where('language', $lang);
    })->with(['translations' => function ($query) use ($lang) {
      $query->where('language', $lang);
    }])->get()->map(function ($blog) {
      $blog->created_at = $blog->created_at->format('Y-m-d');
      $blog->updated_at = $blog->updated_at->format('Y-m-d');

      $blog->translations = $blog->translations->map(function ($translation) {
        $translation->created_at = $translation->created_at->format('Y-m-d');
        $translation->updated_at = $translation->updated_at->format('Y-m-d');

        return $translation;
      });

      return $blog;
    });

    return response()->json($blogs);
  }

  public function store(Request $request) {
    $validated = $request->validate([
      'image'                   => 'nullable|string',
      'translations'            => 'required|array',
      'translations.*.language' => 'required|in:fr,ar,en',
      'translations.*.title'    => 'required|string',
      'translations.*.content'  => 'required|string',
    ]);

    try {
      DB::beginTransaction();
      $blog = Blog::create(['image' => $validated['image']]);
      foreach ($validated['translations'] as $translation) {
        $blog->translations()->create($translation);
      }
      DB::commit();

      return response()->json($blog->load('translations'), 201);
    } catch (\Exception $e) {
      DB::rollBack();

      return response()->json(['error' => 'Erreur lors de la création'], 500);
    }
  }

  public function show($id, $language) {
    $blog = Blog::with(['translations' => function ($query) use ($language) {
      $query->where('language', $language);
    }])->findOrFail($id);

    return response()->json($blog);
  }

  public function update(Request $request, $id) {
    $blog = Blog::findOrFail($id);
    $blog->update($request->only('image'));

    return response()->json($blog->load('translations'));
  }

  public function destroy($id) {
    Blog::findOrFail($id)->delete();

    return response()->json(['message' => 'Blog supprimé']);
  }
}
