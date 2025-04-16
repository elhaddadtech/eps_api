<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TranslationController extends Controller {public function indexByLanguage(string $lang) {
  $translations = DB::table('translations')
    ->where('language', $lang)
    ->pluck('value', 'key');

  // Fallback to 'fr' if empty
  if ($translations->isEmpty()) {
    $translations = DB::table('translations')
      ->where('language', 'fr')
      ->pluck('value', 'key');

    $lang = 'fr';
  }

  return response()->json([
    'language'     => $lang,
    'translations' => $translations,
  ]);
}}
