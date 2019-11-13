@extends('template')
@section('title')
  Busca
@endsection
@section('content')
<div class="card w-100">
    <div class="card-header">
    <form id="form" method="POST" action="{{url('cracha/buscar')}}">
        {{csrf_field()}}
        <label for="cpf">Buscar Participante</label>
        <div class="row">
        <div class="input-group col-sm-6">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="material-icons">picture_in_picture</i></span>
                </div>
                <input type="text" id="cpf" name="cpf"  maxlength="14" class="form-control" placeholder="CPF">
            </div>
        <div class="input-group col-sm-6">
            <button type="submit" class="btn btn-outline-primary">Buscar</button>
            </div>
            </div>
        </form>
        </div>
    <div class="card-body">
        @if(isset($participante))
        @if($participante != '[]')
        <table class="table table-striped table-borderless bg-white" style="border-style: solid; border-color: #dee2e6; border-width: 0 1px 1px 1px;">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>RG</th>
                                    <th>Data de Nascimento</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Organização</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($participante as $participantes)
                                    <tr>
                                        <td>{{$participantes->nome}}</td>
                                        <td>{{$participantes->rg}}</td>
                                        <td>{{\Carbon\Carbon::parse($participantes->data)->format('d/m/Y')}}</td>
                                        <td>{{$participantes->email}}</td>
                                        <td>{{$participantes->telefone}}</td>
                                        <td>{{$participantes->organizacao}}</td>
                                        <tr>
                                    @endforeach
                            </tbody>
                        </table>
            @else
                <h1>Sem Participante Encontrado</h1>
            @endif
            @else
                <h1>Sem Participante Encontrado</h1>
            @endif
        </div>
    </div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

            <script>
            
                  $(document).ready(function () { 
                    var cpf = $("#cpf");
                    cpf.mask('000.000.000-00', {reverse: true});

                    $("#telefone").mask(behavior);
                    
                    var rg = $("#rg");
                    rg.mask('00.000.000-0');

                 });

                 var behavior = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 00000-0009';
                },

                options = {
                    onKeyPress: function (val, e, field, options) {
                        field.mask(behavior.apply({}, arguments), options);
                    }
                };
            </script>
@endsection