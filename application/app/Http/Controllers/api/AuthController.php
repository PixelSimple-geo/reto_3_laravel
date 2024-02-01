<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        try {
            $jsonData = $request->json()->all();
            $codigo = $jsonData['codigo'];
            $cliente = Cliente::where(['codigoCliente' => $codigo])->firstOrFail();
            return response()->json(['cliente' => $cliente]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'error de la base de datos'], 500);
        }
    }
}
