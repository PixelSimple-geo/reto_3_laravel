<?php

namespace App\Http\Controllers;

use App\Mail\MailSender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller {
    public function index(Request $request) {
        $data = [
            "email" => $request->input("email"),
            "address" => $request->input("address"),
            "telefono" => $request->input("telefono"),
            "commentary" => $request->input("commentary")
        ];
        try {
            Mail::to("jorge.egea@ikasle.egibide.org")->send(new MailSender($data));
            return response()->json(['It worked']);
        } catch (\Exception $exception) {
            return response()->json(["message" => "Ha ocurrido un error al intentar enviar tu formulario. " .
            "Si el error persiste contacta con soporte.", "statusCode" => 500], 500);
        }
    }
}
