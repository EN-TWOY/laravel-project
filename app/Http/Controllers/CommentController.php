<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        $users = User::all();
        return view("comment", compact('comments', 'users'));
    }

    public function create(Request $request) {
        try {
            $com = new Comment();
            $com->contenido = $request->input('txtcontenido');
            $com->fecha_comentario = $request->input('txtfecha');
            $com->usuario_id = $request->input('txtusuario');
            $com->save();

            return redirect()->route('comment.index')->with('success', 'Se registro con éxito');
        } catch (\Exception $e) {
            return back()->with("error", "Ocurrió un error: " . $e->getMessage());
        }
    } 

    public function update(Request $request) {
        try {
            $com = new Comment();
            $com->contenido = $request->input('txtcontenido');
            $com->fecha_comentario = $request->input('txtfecha');
            $com->usuario_id = $request->input('txtusuario');
            $com->update();

            return redirect()->route('comment.index')->with('success', 'Se actualizo con éxito');
        } catch (\Exception $e) {
            return back()->with("error", "Ocurrió un error: " . $e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $sql = DB::delete("delete from comentario where comentario_id = $id ");
        
            if ($sql == true) {
                return back()->with("success", "Se eliminó correctamente");
            } else {
                return back()->with("error", "Ocurrió un error al intentar eliminar");
            }
        } catch (\Exception $e) {
            return back()->with("error", "Ocurrió un error: " . $e->getMessage());
        }
    }  

}
