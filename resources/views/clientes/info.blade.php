@extends('layouts.principal')
@section('titulo', 'Clientes-Detalhes')
@section('conteudo')
    <h1>Info</h1>
    <p>ID: {{$cliente['id']}}</p>
    <p>ID: {{$cliente['nome']}}</p>
    <br>
    <a href="{{ route('clientes.index')}}">Voltar</a>
@endsection