<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Evento: {{$evento->nome}}</h3>
    <h3>Data: {{$evento->data}}</h3>

    @foreach($evento->participante as $participante)
        {{$participante->nome}}
    @endforeach
</body>
</html>