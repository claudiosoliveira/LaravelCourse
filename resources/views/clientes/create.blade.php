@extends('layouts.principal')
@section('titulo', 'Clientes-novo')
@section('conteudo')
    <h1>novo CLiente</h1>
    <form action="{{route('clientes.store')}}" method="POST">
        @csrf
        <input type="text" name ="nome">
        <input type="submit" value="Salvar">
    </form>
@endsection