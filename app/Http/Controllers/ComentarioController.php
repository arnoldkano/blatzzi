<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\comentario;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class ComentarioController extends Controller
{
    //
    public function store(Request $request, User $user, Post $post){
        //validar
        $this->validate($request, [
            'comentario' => ['required', 'max:255']
        ]);
        //Almacenar resultado
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario
        ]);
        //imprimir un mensaje
        return back()->with('mensaje', 'Comentario realizado correctamente');
    }
}
