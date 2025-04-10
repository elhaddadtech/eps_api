<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller {
  public function index() {
    return response()->json(Consultation::with(['user', 'destination'])->get());
  }

  public function store(Request $request) {
    $validated = $request->validate([
      'user_id'        => 'required|exists:users,id',
      'destination_id' => 'required|exists:destinations,id',
      'status'         => 'required|in:pending,confirmed,rejected',
    ]);

    $consultation = Consultation::create($validated);

    return response()->json($consultation, 201);
  }

  public function show($id) {
    return response()->json(Consultation::with(['user', 'destination'])->findOrFail($id));
  }

  public function update(Request $request, $id) {
    $consultation = Consultation::findOrFail($id);
    $consultation->update($request->all());

    return response()->json($consultation);
  }

  public function destroy($id) {
    Consultation::destroy($id);

    return response()->json(['message' => 'Consultation supprimée']);
  }
}
