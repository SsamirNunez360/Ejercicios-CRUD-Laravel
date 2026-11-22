@extends('layouts.app')

@section('titulo', 'Inicio')

@section('contenido')
    <h1>Bienvenido, {{ auth()->user()->usuario }}</h1>
    <p>La sesión está iniciada.</p>
@endsection