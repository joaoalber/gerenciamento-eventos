<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ficha do {{$participante->nome}}</title>
</head>
<body>
    <div class="col">
        <p> Nome: {{$participante->nome}}</p>
        <p>RG: {{$participante->rg}}</p>
        <p>CPF: {{$participante->cpf}}</p>
        <p>email: {{$participante->email}}</p>
        <p>telefone: {{$participante->telefone}}</p>
        <p>Data de nascimento: {{\carbon\carbon::parse($participante->data_nascimento)->format('d/m/Y')}}</p>
        <p>Organizacao: {{$participante->organizacao}}</p>
    </div>
</body>
</html>