<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {

        $datos=DB::select("select * from usuario");

        return view("welcome")->with("datos", $datos);
    }

    public function create(Request $request) {
        try {
            $sql = DB::insert("insert into usuario(usuario_id, nombre, correo, telefono) values(?,?,?,?)", [
                $request->txtcodigo,
                $request->txtnombre,
                $request->txtcorreo,
                $request->txttelefono
            ]);
    
            if ($sql == true) {
                return back()->with("success", "Se registró correctamente");
            } else {
                return back()->with("error", "Ocurrió un error al intentar registrar");
            }
        } catch (\Exception $e) {
            // Manejar la excepción y devolver un mensaje de error
            return back()->with("error", "Ocurrió un error: " . $e->getMessage());
        }
    }    

    public function update(Request $request) {
        try {
            $sql = DB::update("update usuario set nombre=?, correo=?, telefono=? where usuario_id=? ", [
                $request->txtnombre,
                $request->txtcorreo,
                $request->txttelefono,
                $request->txtcodigo
            ]);

            if($sql == 0){
                $sql = 1;
            }
    
            if ($sql == true) {
                return back()->with("success", "Se actualizo correctamente");
            } else {
                return back()->with("error", "Ocurrió un error al intentar actualizar");
            }
        } catch (\Exception $e) {
            // Manejar la excepción y devolver un mensaje de error
            return back()->with("error", "Ocurrió un error: " . $e->getMessage());
        }
    } 

    public function delete($id) {
        try {
            $sql = DB::delete("delete from usuario where usuario_id = $id ");
        
            if ($sql == true) {
                return back()->with("success", "Se eliminó correctamente");
            } else {
                return back()->with("error", "Ocurrió un error al intentar eliminar");
            }
        } catch (\Exception $e) {
            // Manejar la excepción y devolver un mensaje de error
            return back()->with("error", "Ocurrió un error: " . $e->getMessage());
        }
    }        
}
