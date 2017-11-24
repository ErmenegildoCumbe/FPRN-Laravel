@extends('layouts.template')

@section('content')
<!-- asside -->
<div class="container">
    <div class="row">
        <h3>Lista de pedidos para aqui!!...</h3>
        <div class="col-md-4 " style="overflow-y:auto; height: 480px;">
            
             @foreach($listaPedidos as $value)
             <!-- <div class="container"> -->
               <div class="row pedido" style="">
                    <div class="col-md-2">
                        <img src="{{ asset($value->user->foto) }}" alt="perfil" style="width: 32px; height: 32px; position: absolute; float: left;border-radius: 50%; margin-top: 0px;">
                    </div>
                    <div class="col-md-10">
                        <a href="#" style="cursor: default;" onclick="detalhes('{{ $value->id }}')">
                        <div style="">
                            <h4>  {{ $value->combatente->nome }} </h4>
                        </div>
                        <div>
                            <h4>Linha de Credito</h4>
                            <h5> {{ $value->linhacredito->designacao }} </h5>
                        </div>
                        </a>
                    </div>
                   
               </div>                                   
            <!-- </div> -->                 
                                 
            @endforeach       
        
                    
        </div>
        <!-- asside -->
        <!-- <h2>Detalhes do pedido  </h2> -->
        <div class="col-md-8" >
            <div class="row pedidodetalhes" style="height: 480px;">
                <div class="col-md-1">
                    <img src="{{ asset(Auth::user()->foto) }}" alt="perfil" style="width: 50px; height: 50px; position: absolute; float: left;border-radius: 50%; margin-top: 0px;">
                </div>
                <div class="col-md-11 " >
                    <div style="">
                        <div class=" widget-header">
                             <h2>Dados do Combatente</h2>
                        </div>
                        <div id="divnome">
                            <h4> Nome do Combatente: </h4> <span id="nome"></span> <br>
                        </div>
                        <div id="divcontact">
                             <b>Contacto</b>: <span id="contact"></span> <br> 
                        </div>
                        <div id="divsex">
                          <b>Sexo</b>: <span id="sex"></span> <br>
                        </div>
                        <div id="divprov">
                             <b>Provincia</b>: <span id="prov"></span> <br> 
                        </div>
                        <div id="divnucomb">
                           <b>Numero de Combatente</b>: <span id="nucomb"></span> <br>
                        </div>
                        
                    </div>
                    
                    <div style="" >
                        <div class=" widget-header">
                            <h2>Dados do Pedido de Emprestimo</h2> <span>
                        </div>
                        <!-- <input type="button" class="btn btn-success" id="paraAnalizar" value="Avaliar" > -->
                            <input type="hidden" class="span4" id="iddopedido" value="0" /> </span>
                        <div id="divtitulo">
                            <h4> Titulo do Projecto: </h4> <span id="titulo"></span> <br>
                        </div>
                        <div id="divobjctivo">
                            <h4> Objectivo: </h4> <span id="objctivo"></span> <br>
                        </div>
                        <div id="divpalvo">
                           <h4> Publico-alvo: </h4> <span id="palvo"></span> <br> 
                        </div>
                        <div id="divtempo">
                            <h4> Duraçao: </h4> <span id="tempo"></span> <br>
                        </div>
                        <div id="divvalor">
                            <h4> Custo: </h4> <span id="valor"></span> <br>
                        </div>
                        <div id="divareaactua">
                           <h4> Area de actuaçao: </h4> <span id="areaactua"></span> <br> 
                        </div>
                        <div id="paraficheiro">
                            <b> Ficheiro Anexado ao projecto </b>
                            <input class="btn btn-primary" type="button" name="ficheiro" id="ficheiro" value="Ler Ficheiro" >
                        </div>
                       
                    </div>
                </div>
            </div>

        </div>
    </div>
    
</div>



<!-- visualizacao do content -->




<script type="text/javascript">
// Visualizacao de talhes do pedido de emprestimo...
    function detalhes(cod){
            document.getElementById("iddopedido").value=cod;
            var dat = cod;
        //console.log(dat);
         $.ajax({
                type: 'jax',
                method: 'get',
                url: "{{ route('detail') }}",
                data: 'dat='+dat,
                //async: false,
                dataType: 'json',
                success: function (resposta) {
                    
                    //document.getElementById("numpedi").innerHTML = resposta.id;
                    document.getElementById("nome").innerHTML = resposta.combatente.nome;
                    document.getElementById("nome").innerHTML += " "+resposta.combatente.apelido;
                    document.getElementById("contact").innerHTML = resposta.combatente.telefone;
                    document.getElementById("sex").innerHTML = " "+resposta.combatente.sexo;
                    document.getElementById("prov").innerHTML = " "+resposta.combatente.provincia.provincia;
                    document.getElementById("nucomb").innerHTML = " "+resposta.combatente.numeroCombatente;
                    //Dados do projecto...
                    if (resposta.linhacredito.id== 1) {
                         document.getElementById("divtitulo").style.display="none";
                    document.getElementById("divobjctivo").style.display="none";
                     document.getElementById("divpalvo").style.display="none";
                     document.getElementById("divareaactua").style.display="none";
                     document.getElementById("paraficheiro").style.display="none";
                    }
                    else{
                         document.getElementById("divtitulo").style.display="inline";
                    document.getElementById("divobjctivo").style.display="inline";
                     document.getElementById("divpalvo").style.display="inline";
                     document.getElementById("divareaactua").style.display="inline";
                     document.getElementById("paraficheiro").style.display="inline";
                     document.getElementById("areaactua").innerHTML = resposta.projecto.area.areaactuacaofundo;
                    }
                    document.getElementById("titulo").innerHTML = resposta.projecto.tituloProjecto;
                    document.getElementById("objctivo").innerHTML = resposta.projecto.objectivo;
                    document.getElementById("palvo").innerHTML = resposta.projecto.publicoAlvo;
                    document.getElementById("tempo").innerHTML = resposta.tempoProposto;
                    document.getElementById("valor").innerHTML = resposta.montante;
                    
                   
                },
                error: function (er) {
                    //$("#sucesso").load(location.href + " #sucesso>*", "");
                    //$('#sucesso').text('Projecto nao foi gravado');
                    alert("Ocoreu algum erro...");
                    console.log(er);
                }
            });
        }
         $('#paraAnalizar').click(function () {
            var tm= document.getElementById("iddopedido").value;
            //"{{URL::to('pedidoanalise/')}}"+"/"+tm;
        window.location="{{URL::to('pedidoanalise/')}}"+"/"+tm;
     });
// Fim da Visualizacao de talhes do pedido de emprestimo...
    $("#procurar").keyup(function () {
//split the current value of searchInput
        var data = this.value.split(" ");
//create a jquery object of the rows
        var jo = $("#tdBoddy").find("tr");
        if (this.value == "") {
            jo.show();
            return;
        }
//hide all the rows
        jo.hide();

//Recusively filter the jquery object to get results.
        jo.filter(function (i, v) {
            var $t = $(this);
            for (var d = 0; d < data.length; ++d) {
                if ($t.is(":contains('" + data[d] + "')")) {
                    return true;
                }
            }
            return false;
        })
//show the rows that match.
                .show();
    }).focus(function () {
        this.value = "";
        $(this).css({
            "color": "black"
        });
        $(this).unbind('focus');
    }).css({
        "color": "#C0C0C0"
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sexo').change(function () {
            $("#tabela td.sexo:contains('" + $(this).val() + "')").parent().show();
            $("#tabela td.sexo:not(:contains('" + $(this).val() + "'))").parent().hide();
        });

        

    });
</script>
@endsection

