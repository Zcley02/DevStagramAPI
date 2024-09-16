@extends('layouts.app')

@section('titulo')
    Registrarse en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-1/2 p-4">
            <img src="{{ asset('image/registrar.jpg') }}" alt="Registrar">
        </div>

        <div class="md:w-4/12 bg-white p-5 shadow-xl rounded-lg">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="mb-2 block text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input 
                        id="name"
                        name="name"
                        type="text"
                        class="border p-2 w-full rounded-lg @error('name') border-red-500 @enderror"
                        placeholder="Nombre"
                        value="{{ old('name') }}"
                    >

                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="username" class="mb-2 block text-gray-500 font-bold">
                        Username
                    </label>
                    <input 
                        id="username"
                        name="username"
                        type="text"
                        class="border p-2 w-full rounded-lg @error('username') border-red-500 @enderror"
                        placeholder="Username"
                        value="{{ old('username') }}"
                    >
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="mb-2 block text-gray-500 font-bold">
                        Email
                    </label>
                    <input 
                        id="email"
                        name="email"
                        type="email"
                        class="border p-2 w-full rounded-lg @error('email') border-red-500 @enderror"
                        placeholder="Email"
                        value="{{ old('email') }}"
                    >
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="mb-2 block text-gray-500 font-bold">
                        Password
                    </label>
                    <input 
                        id="password"
                        name="password"
                        type="password"
                        class="border p-2 w-full rounded-lg @error('password') border-red-500 @enderror"
                        placeholder="Password"
                    >
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="mb-2 block text-gray-500 font-bold">
                        Repite Password
                    </label>
                    <input 
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        class="border p-2 w-full rounded-lg"
                        placeholder="Repite tu password"
                    >
                </div>
                    <input 
                        type="submit"
                        class="bg-sky-600 hover:bg-sky-800 transition-colors text-white p-2 w-full rounded-lg font-bold"
                    >
                
            </form>
        </div>
    </div>
@endsection