<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {
  // Récupérer tous les utilisateurs
  public function index() {
    $users = User::all();

    return response()->json($users, 200);
  }

  // Créer un nouvel utilisateur
  public function store(Request $request) {
    // Validation des données
    $validator = Validator::make($request->all(), [
      'name'     => 'required|string|max:15',
      'email'    => 'required|email|unique:users',
      'password' => 'required|string|min:8',
      'role'     => 'required|in:admin,editor,user',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 400);
    }

    // Création de l'utilisateur
    $user = User::create([
      'name'     => $request->name,
      'email'    => $request->email,
      'password' => bcrypt($request->password), // Hashage du mot de passe
      'role'     => $request->role,
    ]);

    return response()->json($user, 201);
  }

  // Afficher un utilisateur spécifique
  public function show($id) {
    $user = User::find($id);

    if (!$user) {
      return response()->json(['message' => 'Utilisateur non trouvé'], 404);
    }

    return response()->json($user, 200);
  }

  // Mettre à jour un utilisateur
  public function update(Request $request, $id) {
    $user = User::find($id);

    if (!$user) {
      return response()->json(['message' => 'Utilisateur non trouvé'], 404);
    }

    // Validation des données
    $validator = Validator::make($request->all(), [
      'name'     => 'nullable|string|max:255',
      'email'    => 'nullable|email|unique:users,email,' . $id,
      'password' => 'nullable|string|min:8',
      'role'     => 'nullable|in:admin,editor,user',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 400);
    }

    // Mise à jour des champs
    if ($request->has('name')) {
      $user->name = $request->name;
    }

    if ($request->has('email')) {
      $user->email = $request->email;
    }

    if ($request->has('password')) {
      $user->password = bcrypt($request->password);
    }

    if ($request->has('role')) {
      $user->role = $request->role;
    }

    $user->save();

    return response()->json($user, 200);
  }

  // Supprimer un utilisateur
  public function destroy($id) {
    $user = User::find($id);

    if (!$user) {
      return response()->json(['message' => 'Utilisateur non trouvé'], 404);
    }

    $user->delete();

    return response()->json(['message' => 'Utilisateur supprimé avec succès'], 200);
  }
}
