@extends('layouts.app')

@section('titulo')
    Página Principal
@endsection

@section('contenido')
    <x-listar_post :posts="$posts"/>
@endsection