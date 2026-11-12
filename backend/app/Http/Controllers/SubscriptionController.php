<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SubscriptionController extends Controller
{
    // Mostrar la vista de planes y métodos de pago (Yape/Plin)
    public function index()
    {
    return view('index'); // Laravel buscará automáticamente resources/views/index.blade.php
    }

    // Registrar la solicitud de membresía del usuario
    public function store(Request $request)
    {
        $request->validate([
            'operation_code' => 'required|string|max:50',
        ]);

        $user = $request->user();
        
        // Guardamos el código de operación temporalmente o notificamos al admin
        // Para simplificar, puedes dejar una nota o actualizar un campo en la base de datos si lo deseas, 
        // o simplemente mostrar un mensaje de éxito indicando que su pago está en revisión.
        
        return redirect()->route('dashboard')->with('success', '¡Comprobante enviado con éxito! Tu cuenta será verificada y activada como VIP en breve.');
    }
}