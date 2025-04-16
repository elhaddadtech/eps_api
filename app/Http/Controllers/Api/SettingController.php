<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller {
  public function index() {
    return response()->json(Setting::all());
  }

  public function store(Request $request) {
    $validated = $request->validate([
      'key'      => 'required|string|unique:settings',
      'value'    => 'required|string',
      'language' => 'required|in:fr,ar,en',
    ]);

    $setting = Setting::create($validated);

    return response()->json($setting, 201);
  }

  public function show($id) {
    return response()->json(Setting::findOrFail($id));
  }

  public function update(Request $request, $id) {
    $setting = Setting::findOrFail($id);

    $validated = $request->validate([
      'key'      => 'sometimes|required|string|unique:settings,key,' . $setting->id,
      'value'    => 'sometimes|required|string',
      'language' => 'sometimes|required|in:fr,ar,en',
    ]);

    $setting->update($validated);

    return response()->json($setting);
  }

  public function destroy($id) {
    Setting::destroy($id);

    return response()->json(['message' => 'Paramètre supprimé']);
  }

  public function getByKey($key, $language) {
    // Try to get setting by requested language
    $setting = Setting::where('key', $key)
      ->where('language', $language)
      ->first();

    // Fallback to 'fr' if not found
    if (!$setting && $language !== 'fr') {
      $setting = Setting::where('key', $key)
        ->where('language', 'fr')
        ->first();
    }

    if ($setting) {
      return response()->json($setting);
    }

    return response()->json(['message' => 'Paramètre non trouvé'], 404);
  }
}
