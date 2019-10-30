<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Participante</title>
</head>
<body>
    <h2>Listagem de participantes</h2>

    <table class="table">
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
        </thead>
        <tbody>
            @if(empty($participantes))
                <div>Você não tem nenhum participante cadastrado.</div>
            @else

            @foreach($participantes as $participante)
                <tr>
                    <td>{{$participante->nome}}</td>
                    <td>{{$participante->email}}</td>
                    <td>{{$participante->telefone}}</td>
                    <td><a href='{{url("participante/show/$participante->id")}}'>Ficha</a></td>
                    <td><a href='{{url("participante/edit/$participante->id")}}'>Atualizar</a></td>
                    <td><a href='{{url("participante/delete/$participante->id")}}'>Deletar</a></td>
                <tr>
            @endforeach    
        </tbody>
    <table>
    @endif
   <a href="{{url('participante/create')}}">Criar participante</a>
</body>
</html>
