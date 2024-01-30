<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Método para mostrar el formulario de contacto
    public function index()
    {
        return view("contact");
    }

    // Método para procesar el envío del formulario de contacto
    public function send(Request $request)
    {
        $mensaje = new Mensaje();
        $mensaje->nombre = $request->input('txtnombre');
        $mensaje->email = $request->input('txtemail');
        $mensaje->mensaje = $request->input('txtmensaje');
        $mensaje->save();

        // Redirige a la página de contacto con un mensaje de éxito
        return redirect()->route('contact.index')->with('success', 'Mensaje enviado con éxito');
    }
}

