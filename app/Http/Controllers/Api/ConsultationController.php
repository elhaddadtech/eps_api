<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\User;
use Illuminate\Http\Request;

class ConsultationController extends Controller {
  public function index() {
    return response()->json(Consultation::with(['user', 'destination'])->get());
  }
  public function store(Request $request) {
    $validated = $request->validate([
      'firstName'   => 'required|string|max:255',
      'lastName'    => 'required|string|max:255',
      'email'       => 'required|email|max:255',
      'phone'       => 'required|string|max:255',
      'gender'      => 'string|nullable',
      'agency'      => 'string|nullable',
      'destination' => 'required|exists:destinations,id',
      'message'     => 'string|nullable|max:2000',
    ]);
    // Check if the user already exists by email
    $user = User::firstOrCreate(
      ['email' => $validated['email']],
      [
        'name'     => $validated['firstName'] . ' ' . $validated['lastName'],
        'password' => bcrypt(strtolower($validated['email'])), // temp password Str::random(12)
      ]
    );

    // Create the consultation linked to the user
    $consultation = Consultation::create([
      'user_id'        => $user->id,
      'destination_id' => $validated['destination'],
      'phone'          => $validated['phone'],
      'gender'         => $validated['gender'],
      'agency'         => $validated['agency'],
      'message'        => $validated['message'],
      'status'         => 'pending', // optional, since it's default
    ]);

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
