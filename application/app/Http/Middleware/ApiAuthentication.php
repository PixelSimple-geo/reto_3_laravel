<?php

namespace App\Http\Middleware;

use App\Models\Cliente;
use App\Models\SesionCliente;
use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthentication {
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('auth-token');

        if (!empty($token) && $this->verificarToken($token)) {
            $response = $next($request);
        } else {
            $codigo = $request->header('codigo');
            try {
                $cliente = Cliente::where('codigoCliente', $codigo)->firstOrFail();
                $token = $this->crearSesionCliente($cliente->id);
                $response = $next($request);
                $response->header('auth-token', $token);
            } catch (ModelNotFoundException $ignore) {
                $response = response()->json(['authenticated' => false], 401);
            }
        }

        return $response
            ->header("Access-Control-Allow-Origin", "http://localhost")
            ->header("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE")
            ->header("Access-Control-Allow-Headers", "auth-token");
    }

    private function verificarToken(string $token): bool {
        try {
            $sessionCliente = SesionCliente::findOrFail($token);
            return $token == $sessionCliente->token;
        } catch (ModelNotFoundException $ignore) {return false;}
    }

    private function crearSesionCliente(string $idCliente): string {
        try {
            $sesionCliente = SesionCliente::where('idCliente', $idCliente)->firstOrFail();
            if (now()->diffInMinutes($sesionCliente->updated_at) >= 15) {
                $uuid = Str::uuid();
                $sesionCliente = new SesionCliente(['token' => $uuid, 'idCliente' => $idCliente]);
                $sesionCliente->save();
                return $uuid;
            }
            return $sesionCliente->token;
        } catch (ModelNotFoundException $ignore) {
            $uuid = Str::uuid();
            $sesionCliente = new SesionCliente(['token' => $uuid,'idCliente' => $idCliente]);
            $sesionCliente->save();
            return $uuid;
        }
    }
}
