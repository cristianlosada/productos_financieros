<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsAndAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Configurar CORS
        $response = $next($request);

        if ($response instanceof Response) {
            $response->headers->set('Access-Control-Allow-Origin', '*'); // Cambia '*' por un dominio específico si es necesario
            $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        }

        // Manejar solicitudes OPTIONS (preflight request)
        if ($request->isMethod('OPTIONS')) {
            return response('', 200)
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        }

        // Verificar autenticación mediante un token de autorización
        // if (!$request->hasHeader('Authorization')) {
        //     return response()->json(['message' => 'No autorizado'], 401);
        // }

        // $authToken = $request->header('Authorization');

        // // Simula la validación del token (esto podría conectarse a un servicio de autenticación, como OAuth o JWT)
        // if ($authToken !== 'tu-token-secreto') {
        //     return response()->json(['message' => 'Token inválido o no autorizado'], 403);
        // }

        return $response;
    }
}
