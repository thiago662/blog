@extends('layouts.principal')

{{--Titulo interativo--}}
@section('titulo', 'Info/'.$cliente['nome'])

@section('conteudo')

<h3>Informações do cliente</h3>

<p>ID: {{$cliente['id']}}</p>
<p>Nome: {{$cliente['nome']}}</p>

<a href="{{route('clientes.index')}}">Voltar</a>

@endsection