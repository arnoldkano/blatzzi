@extends('layouts.app')

@section('titulo')

    Editar Perfil: {{ auth()->user()->username}}
    
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{ route('perfil.store')}}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-3">
                    <label class="mb-2 block uppercase text-gray-500 font-bold mt-1" for="imagen">Username</label>
                    <input type="text" id="username" name="username" placeholder="Tu Nombre de usuario" class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" value="{{ auth()->user()->username }}" />
                    @error('username')
                        <p class=" text-red-500">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="mb-2 block uppercase text-gray-500 font-bold mt-1" for="username">Imagen Perfil</label>
                    <input type="file" id="imagen" name="imagen" placeholder="Tu Nombre de usuario" class="border p-3 w-full rounded-lg @error('imagen') border-red-500 @enderror" value="{{ auth()->user()->username }}" accept=".jpg, .png, .jpeg" />
                    @error('imagen')
                        <p class=" text-red-500">{{$message}}</p>
                    @enderror
                </div>

                <input type="submit" value="Guardar Cambios" class="bg-sky-600 mt-3 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>

        </div>
    </div>
@endsection