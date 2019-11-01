@extends('template')
@section('title', 'Cadastro de participante')
@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif

        <form id="form" method="POST" action="{{url(isset($participante) ? 'participante/update/'.$participante->id : 'participante/store')}}">
        {{csrf_field()}}
            <div class="card text-center">
                <div class="card header" style="background-color: #DCDCDC;">
                    <h2>Cadastro de Participante</h2>
                </div>

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
                            <input required type="text" id="rg" name="rg"  maxlength="8" class="form-control" placeholder="RG" value="{{old('rg', isset($participante) ? $participante->rg : '')}}">
                        </div>

                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">picture_in_picture</i></span>
                            </div>
                            <input required type="text" id="cpf" name="cpf"  maxlength="11" class="form-control" placeholder="CPF" value="{{old('cpf', isset($participante) ? $participante->cpf : '')}}">
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
                            <input required type="text" id="telefone" name="telefone" maxlength="9" class="form-control" placeholder="Telefone" value="{{old('telefone', isset($participante) ? $participante->telefone : '')}}">
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
                    <a class="btn btn-primary " href="{{url('participante')}}">Voltar</a>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </div>
        </form>
@endsection
