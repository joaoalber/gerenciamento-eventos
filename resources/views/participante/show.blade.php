@extends('template')
@section('title', 'Ficha do participante')
@section('home')

@section('css')
    <style>
        ul li {
            font-size: 1rem;
        }
    </style>
@endsection
<?php date_default_timezone_set('America/Sao_Paulo');?>
    <div class="card-deck ficha row">
        <div class="card col-md-6 mx-auto">
            <div class="card-header text-center">
                <h1 class="card-title">Ficha do Participante</h1>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nome:</strong> {{$participante->nome}}</li>
                <li class="list-group-item"><strong>RG:</strong> {{$participante->rg}}</li>
                <li class="list-group-item"><strong>CPF:</strong> {{$participante->cpf}}</li>
                <li class="list-group-item"><strong>Email:</strong> {{$participante->email}}</li>
                <li class="list-group-item"><strong>Telefone:</strong> {{$participante->telefone}}</li>
                <li class="list-group-item"><strong>Data de nascimento:</strong> {{\Carbon\Carbon::parse($participante->data_nascimento)->format('d/m/Y')}}</li>
                <li class="list-group-item"><strong>Organização:</strong> {{$participante->organizacao}}</li>
            </ul>
            <div class="card-body"></div>
            <div class="card-footer text-center">
                <a class="btn btn-outline-success" href="{{url('participante')}}">Voltar</a>
            </div>
            
        </div>
        <div class="card col-md-5 mx-auto">
            <div class="card-header text-center">
                <h1 class="card-title">Eventos</h1>
            </div>
            <div style="overflow-x: auto;">
            <table class="table table-hover text-center" >
                <thead class="thead-light">
                    <th>Evento</th>
                    <th>Data</th>
                    <th colspan="2" style="text-align:left">Hora</th>
                    </thead>
                <tbody>
                    @if(empty($eventos))
                        <div>Você não participa de nenhum evento.</div>
                        @else

                        @foreach($eventos as $evento)
                        <tr>
                            @if(isset($evento->deleted_at))
                            <td style="color:gray">{{$evento->nome}}</td>
                            <td style="color:gray">{{\Carbon\Carbon::parse($evento->data)->format('d/m/Y')}}</td>
                            <td style="color:gray">{{ \Carbon\Carbon::parse($evento->hora)->format('h:i')}}</td>
                            <td style="color:gray">(Excluído)</td>
                            @else
                                @if($evento->cancelado > 0)
                                    <td style="color:red">{{$evento->nome}}</td>
                                    <td style="color:red">{{\Carbon\Carbon::parse($evento->data)->format('d/m/Y')}}</td>
                                    <td style="color:red">{{ \Carbon\Carbon::parse($evento->hora)->format('h:i')}}</td>
                                    <td style="color:red">(Cancelado)</td>
                                @else
                                    @if(date('Y-m-d H:i:s') > $evento->data.' '.$evento->hora)
                                        <td style="color:#c9c90c">{{$evento->nome}}</td>
                                        <td style="color:#c9c90c">{{\Carbon\Carbon::parse($evento->data)->format('d/m/Y')}}</td>
                                        <td style="color:#c9c90c">{{ \Carbon\Carbon::parse($evento->hora)->format('h:i')}}</td>
                                        <td style="color:#c9c90c">(Evento Expirado)</td>
                                    @else
                                        <td style="color:green">{{$evento->nome}}</td>
                                        <td style="color:green">{{\Carbon\Carbon::parse($evento->data)->format('d/m/Y')}}</td>
                                        <td style="color:green">{{ \Carbon\Carbon::parse($evento->hora)->format('h:i')}}</td>
                                        <td><a class="btn btn-outline-info" href='{{url("cracha/$participante->id/$evento->id")}}'>Imprimir Cracha</a></td>
                                    @endif
                                @endif
                            @endif
                            <tr>
                        @endforeach    
                    </tbody>
                    @endif
                <table>
                </div>
            <div class="card-body"></div>
            <div class="card-footer" style="padding-bottom:1px; padding-top:7.5px; display: flex;
    justify-content: center;">
                    {{ $eventos->links() }}
            </div>
        </div>
        
    </div>
    
@endsection
