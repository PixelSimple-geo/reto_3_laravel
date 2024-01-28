<?php

namespace App\Http\Controllers\api;

use App\Models\SesionCliente;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SesionClienteController extends Controller
{
    public function store(Request $request)
    {
        $sesionData = $request->only(['idCliente']);
        $sesionData['token'] = Str::uuid();
        SesionCliente::create($sesionData);
        return response()->json(['token' => $sesionData['token']]);
    }
}
