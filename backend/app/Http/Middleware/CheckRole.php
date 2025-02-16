<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!Auth::check()) {
            return response()->json("Usuário não Autenticado.", 403);
        }

        $user = Auth::user();

        $userRole = $user->role;

        $roleHierarchy = [
            'ADMINISTRATOR' => 4,
            'COORDINATOR' => 3,
            'MONITOR' => 2,
            'STUDENT' => 1,
        ];

        $userLevel = $roleHierarchy[$userRole] ?? 0;

        $requiredLevel = 0;
        $requiredRoles = explode('|', $roles[0]);


        if (in_array($userRole, $requiredRoles)) {
            return $next($request);
        }

        abort(403, 'Acesso não autorizado.');
    }
}