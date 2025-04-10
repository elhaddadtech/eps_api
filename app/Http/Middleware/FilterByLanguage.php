<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilterByLanguage {
  public function handle(Request $request, Closure $next): Response {
    \Log::info('Middleware exécuté avec la langue : ' . $request->route('lang'));
    $language = $request->route('lang'); // Vérifier que 'lang' est bien défini dans la route

    if (!in_array($language, ['fr', 'ar', 'en'])) {
      return response()->json(['error' => 'Langue non supportée'], 400);
    }

    $request->merge(['language' => $language]);

    return $next($request);
  }
}
