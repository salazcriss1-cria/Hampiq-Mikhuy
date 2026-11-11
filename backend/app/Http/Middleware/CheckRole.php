<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();

        if (! $user) {
            abort(403, 'No autenticado.');
        }

        // Si el usuario es admin, permitimos el paso a cualquier rol solicitado
        if ($user->role === 'admin') {
            return $next($request);
        }

        // Validación estricta del rol requerido
        if ($user->role !== $role) {
            abort(403, 'Acceso no autorizado para tu nivel de membresía.');
        }

        return $next($request);
    }
}