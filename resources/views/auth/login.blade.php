@extends('layouts.app')

@section('titulo')
    Inicia sesión en Blatzzi
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="IMAGEN DE LOGIN">
        </div>
        <div class="md:w-4/12 bgç p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf
                
                @if (session('mensaje'))
                    <p class=" text-red-500">{{ session('mensaje') }}</p>
                @endif

                <div class="mb-3">
                    <label class="mb-2 block uppercase text-gray-500 font-bold mt-1" for="email">Correo</label>
                </div>
                <input type="email" id="email" name="email" placeholder="Tu Correo" class="border p-3 w-full rounded-lg" value="{{ old('name') }}"/>
                @error('email')
                    <p class=" text-red-500">{{$message}}</p>
                @enderror

                <div class="mb-3">
                    <label class="mb-2 block uppercase text-gray-500 font-bold mt-1" for="password">Contraseña</label>
                </div>

                <input type="password" id="password" name="password" placeholder="Tu Contraseña" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror mb-2"/>
                @error('password')
                    <p class=" text-red-500">{{$message}}</p>
                @enderror

                <div class="mb-5">
                    <input type="checkbox" name="remember"><label class=" text-gray-500 text-sm" for=""> Mantener mi sesión abierta</label>
                </div>

                <input type="submit" value="Iniciar Sesión" class="bg-sky-600 mt-3 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection