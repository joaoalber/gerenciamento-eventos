@extends('template')
@section('title', 'Cadastro de participante')
@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif

    <h2 class="text-center text-uppercase">Cadastro de participante</h2>
    <hr>
        <form id="form" method="POST" action="{{url(isset($participante) ? 'participante/update/'.$participante->id : 'participante/store')}}">
        {{csrf_field()}}

            <div class="form-row">
                <div class="form-group col-4">
                    <label for="nome">Nome</label>
                    <input required type="text" id="nome" name="nome" placeholder="Ex: Marcelo" min="3"  class="form-control" value="{{old('nome', isset($participante) ? $participante->nome : '')}}">
                </div>

                <div class="form-group col-4">
                    <label for="rg">RG</label> 
                    <input type="text" id="rg" name="rg"  maxlength="8" class="form-control" value="{{old('rg', isset($participante) ? $participante->rg : '')}}">
                </div>

                <div class="form-group col-4">
                    <label for="cpf">CPF</label> 
                    <input type="text" id="cpf" name="cpf"  maxlength="11" class="form-control" value="{{old('cpf', isset($participante) ? $participante->cpf : '')}}">
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-3">
                    <label for="email"> Email</label> 
                    <input type="email" id="email" name="email" class="form-control" value="{{old('email', isset($participante) ? $participante->email : '')}}">
                </div>
            
                <div class="form-group col-3">
                    <label for="telefone"> Telefone</label> 
                    <input type="text" id="telefone" name="telefone" maxlength="9" class="form-control" value="{{old('telefone', isset($participante) ? $participante->telefone : '')}}">
                </div>

                <div class="form-group col-3">
                    <label for="data_nascimento"> Data de nascimento:</label> 
                    <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" value="{{old('data_nascimento', isset($participante) ? $participante->data_nascimento : '')}}">          
                </div>

                <div class="form-group col-3">
                    <label for="organizacao">Organização</label>
                    <input type="text" id="organizacao" name="organizacao" class="form-control" value="{{old('organizacao', isset($participante) ? $participante->organizacao : '')}}">
                </div>
            </div>
            
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
@endsection
