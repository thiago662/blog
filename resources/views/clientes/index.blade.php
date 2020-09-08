@extends('layouts.principal')

@section('titulo', 'Clientes')

@section('conteudo')

<h3>{{$titulo}}</h3>
<a href="{{ route('clientes.create') }}">Novo Cliente</a>

@if (count($clientes)>0)

    <ul>

        @foreach ($clientes as $c)

            <li>

                {{$c['id']}} |
                {{$c['nome']}} |

                <a href="{{ route('clientes.edit', $c['id']) }}">Editar</a> |
                <a href="{{ route('clientes.show', $c['id']) }}">Info</a> |

                <form action="{{route('clientes.destroy', $c['id'])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>

            </li>

        @endforeach

    </ul>

{{--Loops--}}

@for( $i = 0 ; $i < count($clientes) ; $i++ )

    {{ $clientes[$i]['nome'] }}

@endfor

<br>

@foreach ($clientes as $c)

    <p>

        {{ $c['nome'] }}|

        @if($loop->first)
            (Primeiro)|
        @endif
        @if($loop->last)
            (Ultimo)|
        @endif
        ({{ $loop->index }})-{{ $loop->iteration }}/{{ $loop->count }}

    </p>
        
@endforeach

@else

    <h3>Não existe clientes</h3>

@endif

{{--como fazer comentarios no blade--}}
{{--formas de se fazer verificação--}}

@empty($clientes)

    <h3>Não existe clientes</h3>
    
@endempty

@endsection