<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $mensaje->nombre = $request->input('nombre');
        $mensaje->email = $request->input('email');
        $mensaje->mensaje = $request->input('mensaje');
        $mensaje->save();

        // Redirige a la página de contacto con un mensaje de éxito
        return redirect()->route('contact.index')->with('success', 'Mensaje enviado con éxito');
    }
}

