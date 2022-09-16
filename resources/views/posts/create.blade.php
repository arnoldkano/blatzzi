@extends('layouts.app')

@section('titulo')
    Crea una nueva publicación
@endsection

@push('styles')
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />

@endpush


@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('imagenes.store')}}" 
            method="POST" 
            enctype="mulripart/form-data" id="dropzone" 
            class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
            @csrf
        </form>
        </div>

        <div class=" p-10 md:w-1/2 bgç  rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('posts.store') }}" method="POST" novalidate>
                @csrf
                <div class="mb-3">
                    <label class="mb-2 block uppercase text-gray-500 font-bold mt-1" for="titulo">Título</label>
                    <input 
                        type="text" 
                        id="titulo" 
                        name="titulo" 
                        placeholder="Título de la publicación" 
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" 
                        value="{{ old('titulo') }}" 
                    />
                    @error('titulo')
                        <p class=" text-red-500">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="mb-2 block uppercase text-gray-500 font-bold mt-1" for="descripcion">Descripción</label>
                    <textarea  
                        id="descripcion" 
                        name="descripcion" 
                        placeholder="Descripción de la publicación" 
                        class="border p-3 w-full rounded-lg" 
                        />{{ old('descripcion') }}</textarea>

                    @error('descripcion')
                        <p class=" text-red-500">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-5">
                    <input type="hidden" name="imagen" value="{{ old('imagen') }}"/>
                    @error('imagen')
                        <p class=" text-red-500">{{$message}}</p>
                    @enderror
                </div>

                <input 
                type="submit" 
                value="Crear Publicación" 
                class="bg-sky-600 mt-3 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection