@extends('layouts.principal')

@section('conteudo')

<h3>Novo Cliente</h3>
<form action="{{route('clientes.update', $cliente['id'])}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nome" value="{{$cliente['nome']}}">
    <button type="submit">Salvar</button>
</form>

@endsection