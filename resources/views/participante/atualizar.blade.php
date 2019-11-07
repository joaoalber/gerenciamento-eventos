@extends('template')
@section('title', 'Atualizar Dados')
@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif

        <form id="form" method="POST" action="{{url(isset($participante) ? 'participante/update/'.$participante->id : 'participante/store')}}">
        {{csrf_field()}}
        

        <div class="container d-flex h-100 justify-content-center align-items-center" style="min-height: 60vh">
        <div class="card col-11">
        <div class="card-header text-center">Atualizar Dados</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">person</i></span>
                            </div>  
                            <input required type="text" id="nome" name="nome" class="form-control" placeholder="Nome" value="{{old('nome', isset($participante) ? $participante->nome : '')}}">       
                        </div>

                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">perm_identity</i></span>
                            </div>
                            <input required type="text" id="rg" name="rg"  maxlength="12" class="form-control" placeholder="RG" value="{{old('rg', isset($participante) ? $participante->rg : '')}}">
                        </div>

                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">picture_in_picture</i></span>
                            </div>
                            <input required type="text" id="cpf" name="cpf"  maxlength="14" class="form-control" placeholder="CPF" value="{{old('cpf', isset($participante) ? $participante->cpf : '')}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">email</i></span>
                            </div>
                            <input required type="email" id="email" name="email" class="form-control" placeholder="fulano@gmail.com (email)" value="{{old('email', isset($participante) ? $participante->email : '')}}">
                        </div>

                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">phone</i></span>
                            </div>
                            <input  required type="text" id="telefone" name="telefone"  class="form-control" placeholder="Telefone" value="{{old('telefone', isset($participante) ? $participante->telefone : '')}}">
                        </div>

                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">calendar_today</i></span>
                            </div>
                            <input required type="date" id="data_nascimento" name="data_nascimento" class="form-control" placeholder="Data de nascimento" value="{{old('data_nascimento', isset($participante) ? $participante->data_nascimento : '')}}">
                        </div>

                        <div class="input-group col mt-3 mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="material-icons">business</i></span>
                                </div>
                                <input required type="text" id="organizacao" name="organizacao" class="form-control" placeholder="Organização" value="{{old('organizacao', isset($participante) ? $participante->organizacao : '')}}">
                        </div>

                    </div>
                </div>
                <div class="card-footer text-right">
                    <a class="btn btn-outline-primary " href="{{url('participante')}}">Voltar</a>
                    <button type="submit" class="btn btn-outline-success">Salvar</button>
                </div>
            </div>
            </div>
            </div>

            <script>
                  $(document).ready(function () { 
                    var $cpf = $("#cpf");
                    $cpf.mask('000.000.000-00', {reverse: true});

                    $("#telefone").mask(behavior);
                    
                    var $rg = $("#rg");
                    $rg.mask('00.000.000-0');

                 });

                 var behavior = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },

                options = {
                    onKeyPress: function (val, e, field, options) {
                        field.mask(behavior.apply({}, arguments), options);
                    }
                };
            </script>
        </form>
@endsection
