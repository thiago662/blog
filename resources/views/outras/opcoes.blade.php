@extends('layouts.principal')

@section('titulo', 'Opcoes')

@section('conteudo')

<div class="options">
    <ul>
        <li><a class="warning {{$opcao == 1 ? 'selected':''}}" href="{{route('opcoes',1)}}">warning</a></li>
        <li><a class="info {{$opcao == 2 ? 'selected':''}}" href="{{route('opcoes',2)}}">info</a></li>
        <li><a class="success {{$opcao == 3 ? 'selected':''}}" href="{{route('opcoes',3)}}">success</a></li>
        <li><a class="error {{$opcao == 4 ? 'selected':''}}" href="{{route('opcoes',4)}}">error</a></li>
    </ul>
</div>

@if (isset($opcao))

    @switch($opcao)
        @case(1)
            @component('components.alerta', ['titulo'=>'Erro fatal', 'tipo'=>'warning'])
                <p><strong>Erro inesperado</strong></p>
                <p>Ocorreu um erro inesperado</p>
            @endcomponent
            @break
        @case(2)
            @alerta(['titulo'=>'Erro fatal', 'tipo'=>'info'])
                <p><strong>Erro inesperado</strong></p>
                <p>Ocorreu um erro inesperado</p>
            @endalerta
            @break
        @case(3)
            @component('components.alerta', ['titulo'=>'Erro fatal', 'tipo'=>'success'])
                <p><strong>Erro inesperado</strong></p>
                <p>Ocorreu um erro inesperado</p>
            @endcomponent
            @break
        @case(4)
            @alerta(['titulo'=>'Erro fatal', 'tipo'=>'error'])
                <p><strong>Erro inesperado</strong></p>
                <p>Ocorreu um erro inesperado</p>
            @endalerta
            @break
        @default
            
    @endswitch

@endif

@endsection