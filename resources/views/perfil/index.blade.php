@extends('layouts.app')

@section('titulo')
    Editar Perfil: <span class="font-normal"> {{ auth()->user()->username }} </span>
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action=" {{ route('perfil.store') }} " method="POST" enctype="multipart/form-data" class="mt-10 md:mt-8">
                @csrf
                <div class="mb-4">
                    <label for="username" class="mb-2 block text-gray-500 font-bold">
                        Username
                    </label>
                    <input 
                        id="username"
                        name="username"
                        type="text"
                        class="border p-2 w-full rounded-lg @error('username') border-red-500 @enderror"
                        placeholder="Tu nombre de Usuario"
                        value="{{ auth()->user()->username }}"
                    >

                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="imagen" class="mb-2 block text-gray-500 font-bold">
                        Foto de Perfil
                    </label>
                    <input 
                        id="imagen"
                        name="imagen"
                        type="file"
                        class="border p-2 w-full rounded-lg "
                        value=""
                        accept=".jpg, .jpeg, .png"
                    >
                </div>
                <input 
                    type="submit"
                    value="Guardar Cambios"
                    class="bg-sky-600 hover:bg-sky-800 transition-colors text-white p-2 w-full rounded-lg font-bold cursor-pointer"
                >
            </form>
        </div>
    </div>
@endsection