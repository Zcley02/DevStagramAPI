@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="containe mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Image del post {{ $post->titulo }}">
            <div class="p-3">
                <p>0 Likes</p>
            </div>

            <div>
                <p class="font-bold">{{ $post->user->username }} </p>
                <p class="text-sm text-gray-500">
                    {{ $post->created_at-> diffForHumans()}}
                </p>
                <p class="mt-5">
                    {{ $post->descripcion}}
                </p>
            </div>
            @auth
                @if ($post->user_id === auth()->user()->id )
                <form action="{{ route('posts.destroy', $post) }}" class="my-5" method="POST">
                    @method('DELETE')
                    @csrf
                    <input 
                        type="submit"
                        value="Eliminar Publicacion"
                        class="bg-red-500 hover:bg-red-900 text-white p-2 rounded font-bold cursor-pointer"
                        >
                </form>
                @endif
            @endauth
            
        </div>
        <div class="md:w-1/2">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                    <p class="text-xl font-bold text-center mb-5">Agrega un nuevo comentario</p>
                    @if (session('mensaje'))
                        <div class="bg-green-500 mb-6 p-2 rounded-lg text-white uppercase font-bold">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('comentarios.store', ['user' => $user, 'post' => $post]) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="comentario" class="mb-2 block text-gray-500 font-bold">
                                Añade un comentario
                            </label>
                            <textarea 
                                id="comentario"
                                name="comentario"
                                type="text"
                                class="border p-2 w-full rounded-lg @error('descripcion') border-red-500 @enderror"
                                placeholder="Agrega un Comentario"
                            ></textarea>
        
                            @error('comentario')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <input 
                            type="submit"
                            value="Comentar"
                            class="bg-sky-600 hover:bg-sky-800 transition-colors text-white p-2 w-full rounded-lg font-bold"
                        >
                    </form>
                @endauth
                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comentario->count())
                        @foreach ($post->comentario as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold">
                                    {{ $comentario->user->username }}
                                </a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class="p-1 text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
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