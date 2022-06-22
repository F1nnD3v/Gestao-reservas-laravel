@extends('welcome')

@section('title', 'Gestão de reservas')

@section('content')
    <style>
        .divBtns{
            display: flex;
            justify-content: center;
            flex-direction: column;
            gap: 1rem;
            margin-top: 15rem;
        }

        .button{
            margin: auto;
        }

        button{
            border-radius: .5rem;
            padding: 1rem;
            padding-bottom: .5rem;
            padding-top: .5rem;
        }
    </style>
    <div class="divBtns">
        <div class="button">
            <a href="{{url('/GerirPessoas')}}"><button style="margin: auto">Gerir pessoas</button></a>
        </div>
        <div class="button">
            <a href="{{url('/GerirCasas')}}"><button>Gerir casas</button></a>
        </div>
        <div class="button">
            <button>Gerir reservas</button>
        </div>
    </div>
@endsection
