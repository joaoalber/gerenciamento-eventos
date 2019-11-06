@extends('template')
@section('title', 'Ficha do participante')
@section('content')

@section('css')
    <style>
        ul li {
            font-size: 1rem;
        }
    </style>
@endsection

    <div class="ficha row d-flex align-content-center w-100">
        <div class="card col-md-6 mx-auto " >
    
            <div class="card-body text-center">
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

            <div class="card-body text-center">
                <a class="btn btn-outline-success" href="{{url('participante')}}">Voltar</a>
                <button class="imprimir-button btn btn-outline-primary">print </button>
            </div>
            
        </div>
        <div class="card col-md-6 mx-auto">
    
            <div class="card-body text-center">
                <h1 class="card-title">Eventos</h1>
            </div>
            <ul class="list-group list-group-flush">
            @foreach($eventos as $evento)
            <li class="list-group-item">
                <div class="row"> 
                <div class="col-sm-5 text-center">
                {{$evento->nome}}
                </div>
                <div class="col-sm-6 text-right">
                <a class="btn btn-outline-info" href='{{url("cracha/$participante->id/$evento->id")}}'>Imprimir Cracha</a>
                </div>
                </div>
            </li>
                @endforeach
                </ul>
            <div class="card-body text-center">
                
            </div>
            
        </div>
        
    </div>
    
@endsection
