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

    <div class="card-deck ficha row">
        <div class="card col-md-5 mx-auto">
    
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
                <a class="btn btn-success" href="{{url('participante')}}">Voltar</a>
                <button class="imprimir-button btn btn-primary">print </button>
            </div>
            
        </div>
        <div class="card col-md-5 mx-auto">
            <div class="card-header text-center">
                <h1 class="card-title">Eventos que Participa</h1>
            </div>
            <table class="table table-hover text-center">
                <thead class="thead-light">
                    <th colspan="2">Eventos</th>
                    </thead>
                <tbody>
                    @if(empty($eventos))
                        <div>Você não participa de nenhum evento.</div>
                        @else

                        @foreach($eventos as $evento)
                        <tr>
                            <td>{{$evento->nome}}</td>
                            <td><a class="btn btn-info" href='{{url("cracha/$participante->id/$evento->id")}}'>Imprimir Cracha</a></td>
                            <tr>
                        @endforeach    
                    </tbody>
                <table>
                
                @endif
            <div class="card-body"></div>
            <div class="card-footer" style="padding-bottom:1px; padding-top:7.5px; display: flex;
    justify-content: center;">
                    {{ $eventos->links() }}
            </div>
            
        </div>
        
    </div>
    
@endsection
