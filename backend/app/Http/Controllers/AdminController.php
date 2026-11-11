<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    // Listar todos los usuarios registrados
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    // Actualizar el rol de un usuario de forma segura
    public function updateRole(Request $request, User $targetUser)
    {
        // 1. Validar que el rol enviado sea estrictamente 'user' o 'member'
        $request->validate([
            'role' => 'required|in:user,member'
        ]);

        // 2. Doble seguridad: Asegurar que NADIE pueda convertir a otro usuario (o a sí mismo) en 'admin' desde la web
        if ($request->input('role') === 'admin') {
            abort(403, 'No tienes autorización para asignar el rol de administrador.');
        }

        // 3. Opcional: Evitar que te modifiques tu propio rol de admin por error
        if ($targetUser->id === auth()->id()) {
            return redirect()->back()->with('error', 'No puedes modificar tu propio rol de administrador.');
        }

        $targetUser->role = $request->input('role');
        $targetUser->save();

        return redirect()->back()->with('success', '¡Rol de usuario actualizado exitosamente!');
    }
}