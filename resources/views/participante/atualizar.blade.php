@extends('template')
@section('title', 'Atualizar Dados')
@section('content')

    

        <form id="form" method="POST" action="{{url(isset($participante) ? 'participante/update/'.$participante->id : 'participante/store')}}">
        {{csrf_field()}}
        

        <div class="container d-flex h-100 justify-content-center align-items-center row" style="min-height: 60vh">
        @if($errors->any())
             @foreach($errors->all() as $error)
                <div class=" col-md-7 alert alert-danger text-center">{{$error}}</div>
             @endforeach
         @endif
        <div class="card col-11">
        <div class="card-header text-center">Atualizar Dados</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">person</i></span>
                            </div>  
                            <input required type="text" id="nome" name="nome" class="form-control" placeholder="Nome" value="{{old('nome', $participante->nome)}}">       
                        </div>

                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">perm_identity</i></span>
                            </div>
                            <input required type="text" id="rg" name="rg"  maxlength="12" class="form-control" placeholder="RG" value="{{old('rg', $participante->rg)}}">
                        </div>

                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">picture_in_picture</i></span>
                            </div>
                            <input required type="text" id="cpf" name="cpf"  maxlength="14" class="form-control" placeholder="CPF" value="{{old('cpf', $participante->cpf)}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">email</i></span>
                            </div>
                            <input required type="email" id="email" name="email" class="form-control" placeholder="fulano@gmail.com (email)" value="{{old('email', $participante->email)}}">
                        </div>

                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">phone</i></span>
                            </div>
                            <input  required type="text" id="telefone" name="telefone"  class="form-control" placeholder="Telefone" value="{{old('telefone', $participante->telefone)}}">
                        </div>

                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">calendar_today</i></span>
                            </div>
                            <input required type="text" id="data_nascimento" name="data_nascimento" class="form-control" placeholder="Data de nascimento" value="{{old('data_nascimento', \Carbon\Carbon::parse($participante->data_nascimento)->format('d/m/Y'))}}">
                        </div>

                        <div class="input-group col mt-3 mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="material-icons">business</i></span>
                                </div>
                                <input required type="text" id="organizacao" name="organizacao" class="form-control" placeholder="Organização" value="{{old('organizacao', $participante->organizacao)}}">
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

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
            
            <script>

            
            
    $(document).ready(function () {
        
    jQuery.validator.addMethod("data_nascimento", function(value, element){
        var date = new Date();

        var value = value.split('/');
        var value = value[2] + '-' + value[1] + '-' + value[0];
        
        var day = date.getDate();
        var month = date.getMonth();
        var year = date.getFullYear();

        var today = year + '-' + month + '-' + day;

        var retorno = true;

        if(value > today)
            retorno = false;
        
        return this.optional(element) || retorno;
    }, "Informe uma data válida")  

    jQuery.validator.addMethod("verificaespaco", function(value, element) {
    return value.indexOf(" ") == -1 ;
  }, "<span style='color:red'>Não pode conter espaços</span>");


  jQuery.validator.addMethod("dataBR", function (value, element) {
    //contando chars
    if (value.length != 10) return (this.optional(element) || false);
    // verificando data
    var data = new Date();
    var anoAtual = data.getYear();
    var mesAtual = data.getMonth() + 1;
    var diaAtual = data.getDate();
    if (anoAtual < 1000){
      anoAtual+=1900;
    }
  
    var data = value;
    var dia = data.substr(0, 2);
    var barra1 = data.substr(2, 1);
    var mes = data.substr(3, 2);
    var barra2 = data.substr(5, 1);
    var ano = data.substr(6, 4);
    if (data.length != 10 || barra1 != "/" || barra2 != "/" || isNaN(dia) || isNaN(mes) || isNaN(ano) || dia > 31 || mes > 12) return (this.optional(element) || false);
    if ((mes == 4 || mes == 6 || mes == 9 || mes == 11) && dia == 31) return (this.optional(element) || false);
    if (mes == 2 && (dia > 29 || (dia == 29 && ano % 4 != 0))) return (this.optional(element) || false);
    if (ano < 1900 || ano > anoAtual) return (this.optional(element) || false);
    if (ano < anoAtual) return (this.optional(element) || false);
    if (ano >= anoAtual && mes > mesAtual) return (this.optional(element) || false);
    if ((ano >= anoAtual && dia > diaAtual) && (mes >= mesAtual && dia > diaAtual)) return (this.optional(element) || false);
  
    return (this.optional(element) || true);
  }, "Informe uma data válida.");  // Mensagem padrão

jQuery.validator.addMethod("cpf", function(value, element) {
    value = jQuery.trim(value);
 
     value = value.replace('.','');
     value = value.replace('.','');
     cpf = value.replace('-','');
     while(cpf.length < 11) cpf = "0"+ cpf;
     var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
     var a = [];
     var b = new Number;
     var c = 11;
     for (i=0; i<11; i++){
         a[i] = cpf.charAt(i);
         if (i < 9) b += (a[i] * --c);
     }
     if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
     b = 0;
     c = 11;
     for (y=0; y<10; y++) b += (a[y] * c--);
     if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }
 
     var retorno = true;
     if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;
 
     return this.optional(element) || retorno;
 
 }, "Informe um CPF válido");

    $("#form").validate({
        rules:{
            cpf:{
                required:true,
                cpf: true
            },
            email:{
                required:true,
                email:true,
            },
            data_nascimento:{
                required:true,
                data_nascimento: true,
            },
            nome:{
                required:true,
            },
            rg:{
                required:true,
            },
            telefone:{
                required:true,
            },
            organizacao:{
                required:true,
            },
            eventos:{
                required:true,
            },
            
        },
        messages:{
            cpf:{
                required:"<span style='color:red'>Preencha o campo CPF</span>",
            },
            email:{
                required:"<span style='color:red'>Preencha o campo Email</span>",
                email:"<span style='color:red'>Insira um email válido (exemplo@exemplo.com)</span>",
            },
            data_nascimento:{
                required:"<span style='color:red'>Preencha o campo data de Nascimento</span>",
            },
            rg:{
                required:"<span style='color:red'>Preencha o campo RG</span>",
            },
            telefone:{
                required:"<span style='color:red'>Preencha o campo telefone</span>",
            },
            nome:{
                required:"<span style='color:red'>Preencha o campo nome</span>",
            },
            organizacao:{
                required:"<span style='color:red'>Preencha o campo organização</span>",
            },
            eventos:{
                required:"<span style='color:red'>Preencha o campo eventos</span>",
            },
        }
    });

                    var dataNascimento = $("#data_nascimento");
                    dataNascimento.mask('00/00/0000');

                    var cpf = $("#cpf");
                    cpf.mask('000.000.000-00', {reverse: true});

                    var rg = $("#rg");
                    rg.mask('00.000.000-0');

                    $('#telefone').mask('(00) 0000-00009');
                    $('#telefone').change(function(event) {
                    if($(this).val().length == 15){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
                        $('#telefone').mask('(00) 00000-0009');
                    } else {
                        $('#telefone').mask('(00) 0000-00009');
                    }
                    });

                   
        });
            </script>
        </form>
@endsection
