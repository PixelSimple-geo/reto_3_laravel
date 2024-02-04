<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\SesionCliente;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller {

    private const TIEMPO_CADUCIDAD_SESION = 30;

    public function autenticar(Request $request) {
        $codigo = $request->json("codigo");
        try {
            $cliente = Cliente::where('codigoCliente', $codigo)->firstOrFail();
            $token = $this->obtenerTokenDeSesion($cliente->id);
            return response()->json(["auth-token" => $token]);
        } catch (ModelNotFoundException $ignore) {
            return response()->json(["statusCode" => 401, "message" => "Código no válido"], 401);
        }
    }

    private function obtenerTokenDeSesion(string $idCliente): string {
        $sesionCliente = SesionCliente::find($idCliente);
        if (empty($sesionCliente) || $this->comprobarSesionCaducada($sesionCliente))
            return $this->crearNuevaSesion($idCliente);
        return $sesionCliente->token;
    }

    private function comprobarSesionCaducada(SesionCliente $sesionCliente): bool {
        return now()->diffInMinutes($sesionCliente->updated_at) >= self::TIEMPO_CADUCIDAD_SESION;
    }

    private function crearNuevaSesion(string $idCliente): string {
        $uuid = Str::uuid();
        SesionCliente::updateOrCreate(['idCliente' => $idCliente], ['token' => $uuid]);
        return $uuid;
    }
}
