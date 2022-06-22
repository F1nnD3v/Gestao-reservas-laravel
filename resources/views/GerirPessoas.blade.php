@extends('welcome')

@section('title', 'Gerir pessoas')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>
    <a href="{{url('/AdicionarPessoa')}}" class="justify-content-end" style="margin-left: 78.6rem">
        <button class="btn btn-primary justify-content-end">Adicionar pessoa</button>
    </a>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
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
    @if (Session::has('error'))
        <div class="alert alert-info">{{ Session::get('error') }}</div>
    @endif

    <div class="form">
       <ul class="nav nav-tabs">
           <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="#">Gerir pessoas</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="{{url('/GerirCasas')}}">Gerir casas</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="#">Gerir reservas</a>
           </li>
       </ul>
       <table class="table">
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Idade</th>
            <th scope="col">Telefone</th>
            <th scope="col">NIF</th>
            <th scope="col">Tipo</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
                @if($pessoas->count() > 0)
                @foreach($pessoas as $pessoa)
                   <form method="post" action="{{url('/delete/'.$pessoa->id)}}">
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
                                       Tem a certeza que deseja remover esta pessoa?
                                   </div>
                                   <div class="modal-footer">
                                       <input type="submit" name="submit" class="btn btn-primary" value="Sim">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </form>+
                   <tr>
               <td>{{$pessoa->nome}}</td>
                <td>{{$pessoa->email}}</td>
               <td>{{$pessoa->idade}}</td>
                <td>{{$pessoa->telefone}}</td>
                <td>{{$pessoa->nif}}</td>
                <td>{{$pessoa->tipo['tipo']}}</td>
                <td>
                    <a href="{{url('/EditarPessoa', $pessoa->id)}}">
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
                        <td style="text-align:center;" colspan="8">Não existem pessoas</td>
                    </tr>
                @endif
    </table>
   </div>
@endsection
