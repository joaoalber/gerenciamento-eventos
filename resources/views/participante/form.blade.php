<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Participante</title>
</head>
<body>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif

    <h2>Cadastro de participante</h2>
    
        <form id="form" method="POST" action="{{url(isset($participante) ? 'participante/update/'.$participante->id : 'participante/store')}}">
        {{csrf_field()}}
            Nome: <input type="text" id="nome" name="nome" placeholder="Ex: Marcelo" min="3" value="{{old('nome', isset($participante) ? $participante->nome : '')}}"><br><br>

            Rg: <input type="text" id="rg" name="rg"  maxlength="8" value="{{old('rg', isset($participante) ? $participante->rg : '')}}"><br><br>

            CPF: <input type="text" id="cpf" name="cpf" maxlength="11" value="{{old('cpf', isset($participante) ? $participante->cpf : '')}}"><br><br>

            Email: <input type="email" id="email" name="email" value="{{old('email', isset($participante) ? $participante->email : '')}}"><br><br>

            Telefone: <input type="text" id="telefone" name="telefone" maxlength="9" value="{{old('telefone', isset($participante) ? $participante->telefone : '')}}"><br><br>

            Data de nascimento: <input type="date" id="data_nascimento" name="data_nascimento" value="{{old('data_nascimento', isset($participante) ? $participante->data_nascimento : '')}}"><br><br>

            Organização: <input type="text" id="organizacao" name="organizacao" value="{{old('organizacao', isset($participante) ? $participante->organizacao : '')}}"><br><br>

            <button type="submit">Salvar</button>
        </form>
</body>
</html>
