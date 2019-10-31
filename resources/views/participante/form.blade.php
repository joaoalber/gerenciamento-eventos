@extends('template')

@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif

    <h2 class="text-center">Cadastro de participante</h2>
    
        <form id="form" method="POST" action="{{url(isset($participante) ? 'participante/update/'.$participante->id : 'participante/store')}}">
        {{csrf_field()}}

       
        <div class="form-row">
        
       
            <div class="form-group col-md-4">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="Ex: Marcelo" min="3"  class="form-control" value="{{old('nome', isset($participante) ? $participante->nome : '')}}">
            </div>

            <div class="form-group col-md-4">
                <label for="rg">RG</label> 
                <input type="text" id="rg" name="rg"  maxlength="8" class="form-control" value="{{old('rg', isset($participante) ? $participante->rg : '')}}">
            </div>

            </div class="form-group col-md-4 bg-dark">
                  <input type="text" class="form-control">
            </div> 
        </div>
       

            Email: <input type="email" id="email" name="email" value="{{old('email', isset($participante) ? $participante->email : '')}}"><br><br>

            Telefone: <input type="text" id="telefone" name="telefone" maxlength="9" value="{{old('telefone', isset($participante) ? $participante->telefone : '')}}"><br><br>

            Data de nascimento: <input type="date" id="data_nascimento" name="data_nascimento" value="{{old('data_nascimento', isset($participante) ? $participante->data_nascimento : '')}}"><br><br>

            Organização: <input type="text" id="organizacao" name="organizacao" value="{{old('organizacao', isset($participante) ? $participante->organizacao : '')}}"><br><br>

            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
@endsection
