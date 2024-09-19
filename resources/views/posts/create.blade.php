@extends('layouts.app')

@section('titulo')
    Crear nueva publicacion 
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 p-5 bg-white shadow-xl rounded-lg mt-10 md:mt-0">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="titulo" class="mb-2 block text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input 
                        id="titulo"
                        name="titulo"
                        type="text"
                        class="border p-2 w-full rounded-lg @error('titulo') border-red-500 @enderror"
                        placeholder="Titulo de la Publicación"
                        value="{{ old('titulo') }}"
                    >

                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="descripcion" class="mb-2 block text-gray-500 font-bold">
                        Descripción
                    </label>
                    <textarea 
                        id="descripcion"
                        name="descripcion"
                        type="text"
                        class="border p-2 w-full rounded-lg @error('descripcion') border-red-500 @enderror"
                        placeholder="Descripción de la publicación"
                    >{{ old('descripcion') }}</textarea>

                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input 
                        type="hidden" 
                        name="imagen"
                        value="{{ old('imagen') }}"
                    >
                    @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                    @enderror
                </div>
                <input 
                    type="submit"
                    value="Crear Publicación"
                    class="bg-sky-600 hover:bg-sky-800 transition-colors text-white p-2 w-full rounded-lg font-bold"
                >
            </form>
        </div>
    </div>
@endsection