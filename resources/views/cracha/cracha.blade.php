<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Cracha</title>
</head>
<body style="background-color:#3b3b3b">
<div class="container">
    <div class="card border-primary mx-auto mt-5 col-8" style="height: 500px; background-color:#eaf7fc">
        <div class="card-header">
                <input type="text" readonly class="form-control-plaintext" id="nome" value="{{old('nome', isset($evento) ? $evento->nome : '')}}" style="text-align:center;font-size:2.5em;font-weight: bold;">
            </div>
        <div class="card-body mt-5 col justify-content-md-center">
            <div class="form-group mb-3">
                <div class="form-group row justify-content-center">
                    <div class="col ml-2 mr-1">
                        <input type="text" readonly class="form-control-plaintext" id="email" value="{{old('nome', isset($participante) ? $participante->email : '')}}" style="text-align:center;font-size:1.15em;">
                        </div>

                    <div class="col ml-1 mr-2">
                        <input type="text" readonly class="form-control-plaintext" id="organizacao" value="{{old('nome', isset($participante) ? $participante->organizacao : '')}}" style="text-align:center;font-size:1.15em;">
                        </div>
                    </div>
                </div>

            <div class="card border-secondary align-items-center justify-content-center h-25" style="background-color:#c5e0ea">
                <div class="col row">
                    <input type="text" readonly class="form-control-plaintext" id="nome" value="{{old('nome', isset($participante) ? $participante->nome : '')}}" style="text-align:center;font-size:2.5em;font-weight: bold;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


