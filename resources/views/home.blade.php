@extends('template')
@section('title')
  Main
@endsection
@section('home')
<div class="card">
    <div class="card-header">
        <div class="row">
            <i class="material-icons mr-1" style="font-size:50px;">home</i>
            <h1>Bem vindo!</h1>
        </div>
    </div>
    <div class="card-body">

        <div class="row justify-content-center">

            <div class="col-md-5">
                <div class="card text-white bg-info">
                    <div class="card-header">
                        <a style="text-decoration: none;color:white" href="{{url('evento')}}"><h5>Eventos</h5></a>
                    </div>
                    <div class="card-body">
                        <h6>{{$data['evento']}}</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card text-white bg-warning">
                    <div class="card-header">
                        <a style="text-decoration: none;color:white" href="{{url('participante')}}"><h5>Participantes</h5></a>
                    </div>
                    <div class="card-body">
                        <h6>{{$data['participante']}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection