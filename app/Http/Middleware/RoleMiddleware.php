<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, \Closure $next, ...$roles)
    {
        $user = $request->user();

        if (! $user) {
            abort(403);
        }

        // Normalize user role
        $userRole = strtolower(trim((string)($user->role ?? '')));

        // Support multiple roles passed as variadic args and/or comma/pipe separated
        $allowed = [];
        foreach ($roles as $r) {
            foreach (preg_split('/[|,]/', (string)$r) as $part) {
                $part = strtolower(trim($part));
                if ($part !== '') {
                    $allowed[] = $part;
                }
            }
        }

        if (!empty($allowed) && !in_array($userRole, $allowed, true)) {
            abort(403);
        }

        return $next($request);
    }
}
