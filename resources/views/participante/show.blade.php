@extends('template')
@section('title', 'Ficha do participante')
@section('content')

@section('css')
    <style>
        p {
            font-size: 1.5rem;
        }
    </style>
@endsection

    <div class="ficha">
        <h1 class="text-center text-uppercase">Ficha do Participante</h1>
        <hr>
        <div class="row d-flex justify-content-around">
            <p>Nome: {{$participante->nome}}</p>
            <p>RG: {{$participante->rg}}</p>
            <p>CPF: {{$participante->cpf}}</p>
        </div>

        <div class="row d-flex justify-content-around">
            <p>Email: {{$participante->email}}</p>
            <p>Telefone: {{$participante->telefone}}</p>
            <p>Data de nascimento: {{\carbon\carbon::parse($participante->data_nascimento)->format('d/m/Y')}}</p>
           
        </div>

        <div class="row d-flex justify-content-start">
            <p>Organizacao: {{$participante->organizacao}}</p>
        </div>
        
    </div>
    <a class="btn btn-success" href="{{url('participante')}}">Voltar</a>
    <button class="imprimir-button btn btn-primary">print </button>
@endsection
@section('js')

<script src="{{'resources/js/printThis.js'}}"></script>
<script>
    $(document).ready(function(){
        $(document).on('click','.imprimir-button', function(){
        console.log('oi');
        $(".change-class-2").toggleClass("col-lg-2").toggleClass("col-2");
        $(".change-class-10").toggleClass("col-lg-10").toggleClass("col-10");
        var dNow = new Date();
        var day = dNow.getDate() < 10 ? "0"+dNow.getDate() : dNow.getDate()
        var month = dNow.getMonth() < 9 ? "0"+dNow.getMonth() : dNow.getMonth()
        var hours = dNow.getHours() < 10 ? "0"+dNow.getHours() : dNow.getHours()
        var minutes = dNow.getMinutes() < 10 ? "0"+dNow.getMinutes() : dNow.getMinutes()
        var localdate = day + '/' + month + '/' + dNow.getFullYear() + ' ' + hours + ':' + minutes;

        $("#ficha").printThis({
            header: "<h1 class='text-center'>Ficha do Participante<h1><hr><br>",
            // footer: `<span class='text-center bottom-center-absolute titulo_cargo'>${localdate}<span><hr><br>`,
            afterPrint: function(){
                $(".change-class-2").toggleClass("col-lg-2").toggleClass("col-2");
                $(".change-class-10").toggleClass("col-lg-10").toggleClass("col-10");
            }
        });
    })
    });
   
</script>
@endsection