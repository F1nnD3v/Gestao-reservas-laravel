@extends('welcome')

@section('title', 'Gerir Reservas')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>
    <a href="{{url('/AdicionarReserva')}}" class="justify-content-end" style="margin-left: 78.6rem">
        <button class="btn btn-primary justify-content-end">Adicionar Reserva</button>
    </a>
    <style>
        body {
            font-family: 'Nunito<', sans-serif;
            background-color: #5C9EAD;
            color: #EEEEEE;
        }

        .form{
            margin: auto;
            width: 50%;
            min-width: 670px;
            background-color: white;
            border-radius: .5rem;
            margin-top: 1rem;
            color:black;
        }

        .navbar{
            background-color: #326273;
            width: 100%;
        }
    </style>
    <div class="form">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{url('/GerirPessoas')}}">Gerir pessoas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{url('/GerirCasas')}}">Gerir casas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/GerirReservas')}}">Gerir reservas</a>
            </li>
        </ul>
        <table class="table">
            <tr>
                <th scope="col">Observações</th>
                <th scope="col">Valor</th>
                <th scope="col">Check In</th>
                <th scope="col">Check Out</th>
                <th scope="col">Localidade</th>
                <th scope="col">Distrito</th>
                <th scope="col">País</th>
                <th scope="col">Dono</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            @if($casas->count() > 0)
                @foreach($casas as $casa)
                    <form method="post" action="{{url('/deleteCasa/'.$casa->id)}}   ">
                        @csrf
                        <div class="modal fade" style="color: black" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Tem a certeza que deseja remover esta casa?
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" value="Sim">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <tr>
                        <td>{{$casa->nome}}</td>
                        <td>{{$casa->morada}}</td>
                        <td>{{$casa->numero}}</td>
                        <td>{{$casa->codigoPostal}}</td>
                        <td>{{$casa->localidade}}</td>
                        <td>{{$casa->distrito}}</td>
                        <td>{{$casa->pais}}</td>
                        <td>{{$casa->dono['nome']}}</td>
                        <td>
                            <a href="{{url('/EditarCasa', $casa->id)}}">
                                <button class="btn btn-outline-primary">
                                    <span class="oi oi-pencil" data-glyph="pencil"></span>
                                    Editar
                                </button>
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                                <span class="oi oi-trash" data-glyph="trash"></span>
                                Remover
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8" style="text-align: center">Não existem casas registadas</td>
                </tr>
            @endif
        </table>
    </div>
@endsection
