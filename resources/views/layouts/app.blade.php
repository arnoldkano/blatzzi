<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @stack('styles')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blatzzi - @yield('titulo')</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        @livewireStyles
    </head>
    <body class=" bg-slate-200">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <a href="{{route('home')}}" class="text-3xl font-black">
                    Blatzzi
                </a>

                @auth
                    <nav class="flex gap-2 items-center">
                        <a class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer" href="{{ route('posts.create') }}">
                    
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                              
                            
                            PUBLICAR
                            
                        </a>
                        <a class="font-bold text-gray-600 text-sm pr-2" href="{{ route('posts.index', auth()->user()->username) }}">Hola: <span class="font-normal"> {{ auth()->user()->username }}</span></a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="font-bold uppercase text-gray-600 text-sm" >Cerrar sesión</button>
                        </form>
                    </nav>
                @endauth

                @guest
                    <nav class="flex gap-2 items-center">
                        <a class="font-bold uppercase text-gray-600 text-sm pr-2" href="{{ route('login') }}">Ingresar</a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Crear Cuenta</a>
                    </nav>
                @endguest

            </div>
        </header>
        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>
        <footer class="text-center p-5 text-gray-500 font-bold uppercase mt-10" >
            Construido en Blatzzi.com
            {{now()->year}}
        </footer>
        @livewireScripts
    </body>
</html>
