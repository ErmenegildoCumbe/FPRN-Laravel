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
                <div class="col-md-2">
                    <img src="{{ asset(Auth::user()->foto) }}" alt="perfil" style="width: 50px; height: 50px; position: absolute; float: left;border-radius: 50%; margin-top: 0px;">
                </div>
                <div class="col-md-10">
                    <div>
                        <h4> Nome do Combatente: </h4> <span id="nome"></span>
                    </div>
                    <div>
                        
                    </div>
                    <div>
                        Ficheiro Anexo ao projecto
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
            //console.log(cod);
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
                    //document.getElementById("linhacred").innerHTML = resposta.linhacredito.designacao;
                    //document.getElementById("numcomb").innerHTML = resposta.combatente.numeroCombatente;
                    //document.getElementById("motante").innerHTML = resposta.montante;
                    //document.getElementById("data").innerHTML = resposta.data;
                    //document.getElementById("funcio").innerHTML = resposta.user.name;
                   
                },
                error: function (er) {
                    //$("#sucesso").load(location.href + " #sucesso>*", "");
                    //$('#sucesso').text('Projecto nao foi gravado');
                    alert("Ocoreu algum erro...");
                    console.log(er);
                }
            });
        }
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

