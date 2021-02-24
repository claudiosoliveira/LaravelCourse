@extends('layouts.principal')
@section('titulo', 'Clientes-Edit')
@section('conteudo')
    <h1>novo CLiente</h1>
    <form action="{{route('clientes.update', $cliente['id'])}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name ="nome" value = "{{'nome'}}">
        <input type="submit" value="Salvar">
    </form>
@endsection