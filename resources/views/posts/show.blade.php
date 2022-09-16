@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            
            <div class=" p-3">
                <p class=" font-bold">{{ $post->user->username }}</p>
                <p class=" text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                @auth
                    <p class=" mt-5">{{ $post->descripcion }}</p>
                @endauth
                @guest
                    <p class=" text-white mt-5 bg-red-600 border-2 rounded-lg text-center">Por favor INGRESA para ver el Contenido</p>
                @endguest
            </div>

            <img src="{{ asset('uploads') . '/' . $post->imagen}}" alt="Imagen de la publicación {{ $post->titulo }}">


            <div class=" p-3 flex items-center gap-2 ">
                @auth
                
                <livewire:like-post :post="$post" />

                    
                @endauth
                
            </div>

            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form method="POST" action="{{ route('posts.destroy', $post)}}">
                        @method('DELETE')
                        @csrf
                        <input 
                        type="submit"
                        value="Eliminar Publicación"
                        class=" bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
                    </form>
                @endif
            @endauth
            

        </div>

        <div class="md:w-1/2 p-5 mt-24">

            <div class=" shadow bg-white p-5 mb-5">
                @auth
                    
                    <p class="text-xl font-bold text-center mb-4">Agrega un nuevo Comentario</p>

                    @if (session('mensaje'))
                        <div class=" bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                            {{session('mensaje')}}
                        </div>
                            
                    @endif

                    <form action="{{ route('comentarios.store', ['post'=>$post, 'user'=>$user])  }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="mb-2 block uppercase text-gray-500 font-bold mt-1" for="comentario">Añade un comentario</label>
                            <textarea  
                                id="comentario" 
                                name="comentario" 
                                placeholder="Agrega un Comentario" 
                                class="border p-3 w-full rounded-lg" 
                                /></textarea>
        
                            @error('comentario')
                                <p class=" text-red-500">{{$message}}</p>
                            @enderror
        
                        </div>

                        <input 
                        type="submit" 
                        value="Comentar" 
                        class="bg-sky-600 mt-3 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

                    </form>

                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class=" p-5 border-gray-300 border-b">
                                <a href="{{ route('posts.index', $comentario->user) }}" class=" font-bold">{{$comentario->user->username}}</a>
                                <p>{{$comentario->comentario}}</p>
                                <p class="text-sm text-gray-500">{{$comentario->created_at->diffForHumans()}}</p>
                            </div> 
                        @endforeach
                    @else
                    <p class="p-10 text-center">No hay Comentarios</p>
                    @endif
                </div>

            </div>
        
        </div>
    </div>
@endsection