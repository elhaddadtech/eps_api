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
    $setting->update($request->all());

    return response()->json($setting);
  }

  public function destroy($id) {
    Setting::destroy($id);

    return response()->json(['message' => 'Paramètre supprimé']);
  }

  public function getByKey($key, $language) {
    $setting = Setting::where('key', $key)->where('language', $language)->first();

    return response()->json($setting ?? ['message' => 'Paramètre non trouvé'], 200);
  }
  public function getByKey($key, $language)
{
    $setting = Setting::where('key', $key)->where('language', $language)->first();

    return response()->json($setting ?? ['message' => 'Paramètre non trouvé'], 200);
}

}
