@extends('layouts.principal')

@section('titulo', 'Novo Clientes')

@section('conteudo')

<h3>Novo Cliente</h3>
<form action="{{route('clientes.store')}}" method="POST">
    @csrf
    <input type="text" name="nome">
    <button type="submit">Salvar</button>
</form>

@endsection