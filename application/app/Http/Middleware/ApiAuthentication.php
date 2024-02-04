<?php

namespace App\Http\Middleware;

use App\Models\SesionCliente;
use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthentication {

    public function handle(Request $request, Closure $next): Response {
        $token = $request->header('auth-token');
        if (!empty($token) && $this->verificarToken($token)) return $next($request);
        else return response()->json(["statusCode" => 401, "message" => "La sesión ha caducado"], 401);
    }

    private function verificarToken(string $token): bool {
        try {
            $sesionCliente = SesionCliente::where('token', $token)->firstOrFail();
            $sesionCliente->touch();
            return ($token === $sesionCliente->token);
        } catch (ModelNotFoundException $ignore) {return false;}
    }


}
