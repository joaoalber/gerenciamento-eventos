@extends('template')

@section('title')
  Participantes
@endsection

@section('css')

<style>
      #teste #first{
          margin-right: 2rem;
      }
  </style>
@endsection
@section('content')

<div class="card text-center position-static" style="margin:auto;width:110%;">
        <div class="card-header">
            <h3>Lista de Participantes</h3>
        </div>
        <div class="card-body"><nav>
            <div class="tab-content" id="nav-tabContent" style="width:100%">
                <div class="tab-pane fade show active" id="nav-teste" role="tabpanel" aria-labelledby="nav-teste-tab">
                    <div>
                        <table class="table table-striped table-borderless bg-white" style="border-style: solid; border-color: #dee2e6; border-width: 0 1px 1px 1px;">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(empty($evento->participante))
                                    <div>Você não tem nenhum participante cadastrado nesse evento.</div>
                                @else
                                
                                                
                                @foreach($evento->participante as $participantes)
                                    <tr>
                                        <td>{{$participantes->nome}}</td>
                                    <tr>
                                @endforeach  
                                @endif
                            </tbody>
                        </table>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary" onclick="window.print()">Imprimir Lista</button>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- 

    <div class="container d-flex h-100 justify-content-center align-items-center" style="min-height: 60vh">
        <div class="card col-9">
            <div class="card-header"><h3 style="text-align: center">Lista de Participantes</h3></div>
            <div class="card-body">
            <table class="table table-hover text-center">
            <thead class="thead-dark">
                <th colspan="2">Participantes</th>
                </thead>
            <tbody>
                @if(empty($evento->participante))
                    <div>Você não tem nenhum participante cadastrado nesse evento.</div>
                @endif

                @foreach($evento->participante as $participantes)
                    <tr>
                        <td>{{$participantes->nome}}</td>
                        <td><a class="btn btn-info" href='{{url("cracha/$participantes->id/$evento->id")}}'>Imprimir Cracha</a></td>
                    <tr>
                @endforeach    
                </tbody>
                <table>
        </div>
        <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" onclick="window.print()">Imprimir Lista</button>
                    </div>
    </div> -->

@endsection