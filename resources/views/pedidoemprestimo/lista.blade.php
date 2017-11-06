@extends('layouts.template')

@section('content')

<!-- Modal... -->
<div class="modal fade" id="myModal" tabindex="1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detalhes do Pedido de Emprestimo</h4>
      </div>
      <div class="modal-body">
        <h4>Numero do pedido  <span id="numpedi"></span></h4>
        <h4>Tipo de credito  <span id="linhacred"></span></h4>
        <h4>Nome do Combatente  <span id="nomcomb"></span></h4>
        <h4>Numero do Combatente  <span id="numcomb"></span></h4>
        <h5>Montante requisitado  <span id="motante"></span></h4>
        <h5>Data de submissao  <span id="data"></span></h4>
        <h5>Funcionário que fez a submissao  <span id="funcio"></span></h4>
        <h5>Estado do Pedido  <span id="estado"></span></h4>
        <!-- <p>One fine body&hellip;</p> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="row">
    <div class="span12">
       

        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Lista de Pedidos</h3>              
                <input id="procurar" type="text" class="pull-right search-query" placeholder="Procurar por nomes..." style="margin-top: 6px; margin-right: 6px">
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <table id="tabela" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th> Nome </th>
                            <th> Montante Requisitado </th>
                            <th> Estado</th>
                            <!-- <th></th> -->
                            <th class="td-actions"> Accoes</th>
                        </tr>
                    </thead>
                    <tbody id="showdata">
                         @foreach ($pedidos as $pedido)
                            <tr>
                                <td> {{ $pedido->combatente->nome }} {{ $pedido->combatente->apelido}}  </td>
                                <td> {{ $pedido->montante }} </td>
                                <!-- <td><?php //echo $pedido->montanteDisponibilizado; ?></td> -->
                                <?php if ($pedido->pedidoestado == 0) { ?>
                                    <td><span class="btn-warning btn-small">pendente</span></td>
                                <?php } ?>
                                <?php if ($pedido->pedidoestado == 1) { ?>
                                    <td><span class="btn-info btn-small">em avaliacao</span></td>
                                <?php } ?>
                                <?php if ($pedido->pedidoestado == 2) { ?>
                                    <td><span class="btn-primary btn-small">pre-aprovado</span></td>
                                <?php } ?>
                                <?php if ($pedido->pedidoestado == 3) { ?>
                                    <td><span class="btn-success btn-small">aprovado</span></td>
                                <?php } ?>
                                <?php if ($pedido->pedidoestado == 4) { ?>
                                    <td><span class="btn-danger btn-small">reprovado</span></td>
                                <?php } ?>
                                <td class="td-actions">
                                    <input type="button" class="btn btn-success btn-small" onclick="detalhes('{{ $pedido->id }}')" value="Detalhes" name="another">
                                    <!-- <a href="#<?php //echo site_url("PedidoEmprestimo_controller/aprovarDir/$value->idEmprestimo/$value->idPedidoEmprestimo") ?>" class="btn btn-success btn-small" onclick="detalhes('{{$pedido->id }}')"><i class="icon-ok"></i> Detalhes</a> -->
                                   <!--  <a href="<?php //echo site_url("PedidoEmprestimo_controller/reprovarDir/$value->idEmprestimo/$value->idPedidoEmprestimo") ?>" class="btn btn-danger btn-small"><i class="icon-remove"></i></a> -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /widget-content --> 
        </div>
    </div>
</div>
<!-- /row -->



<script type="text/javascript">

    $('#myModal').on('shown.bs.modal', function () {
     $('#myInput').focus()
    });

    $(function () {

        $('#procurar').autocomplete({
            source : '{{ route('combatenteauto') }}',
            minlenght:1,
            autoFocus:true,
            select:function(e,ui){
               // alert(ui.item.id);
               var dat = ui.item.id;
        //console.log(dat);
         $.ajax({
                type: 'jax',
                method: 'get',
                url: "{{ route('getmach') }}",
                data: 'dat='+dat,
                //async: false,
                dataType: 'json',
                success: function (resposta) {
                    //console.log(resposta.length);
                    // document.getElementById("numcomb").innerHTML = resposta.id;
                    // document.getElementById("nomcomb").innerHTML = resposta.combatente.nome;
                    // $('#myModal').modal('show');
                     var html = '';
                     for (var i = 0; i < resposta.length; i++) {
                         
                     
                     var estad = "pendente";
                    if (resposta[i].pedidoestado = 1) {
                        estad = "em avaliacao";
                    }
                    else if(resposta[i].pedidoestado = 0){
                        estad = "pendente";
                    }
                    else if(resposta[i].pedidoestado = 2){
                        estad = "pre-aprovado";
                    }
                    else if(resposta[i].pedidoestado = 3){
                        estad = "aprovado";
                    }
                    else if(resposta[i].pedidoestado = 4){
                        estad = "reprovado";
                    }
                html += '<tr>' +
                                '<td>' + resposta[i].combatente.nome+' '+resposta[i].combatente.apelido + '</td>' +
                                '<td>' + resposta[i].montante + '</td>' +
                                '<td>' + estad + '</td>' +
                                
                                '<td>' +
                                '<input type="button" class="btn btn-success btn-small" onclick="detalhes('+resposta[i].id+')" value="Detalhes" name="another">' +
                                '</td>' +
                                '</tr>';
                    }
                                $('#showdata').html(html);
                },
                error: function (er) {
                    //$("#sucesso").load(location.href + " #sucesso>*", "");
                    //$('#sucesso').text('Projecto nao foi gravado');
                    alert("Ocoreu algum erro...");
                    console.log(er);
                }
            });

               
            }
        });
        });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sexo').change(function () {
            $("#tabela td.sexo:contains('" + $(this).val() + "')").parent().show();
            $("#tabela td.sexo:not(:contains('" + $(this).val() + "'))").parent().hide();
        });

    });
    function detalhes(cod){
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
                    //$('input[name="projectoId"]').val(resposta);
                    // $('#sucesso').html('Projecto Adicionado com sucesso').fadeIn().delay(4000).fadeOut('show');
                    //$('#sucesso').text("Projecto Adicionado com sucesso");
                    //$("#sucesso").append("<img id='theImg' src='{{ asset('img/project.png') }}'/>");
                    //document.getElementById("montante").innerHTML = $('#custoProjecto').val();
                    //document.getElementById("tempoProposto").innerHTML = $('#duracaoProjecto').val();
                    document.getElementById("numpedi").innerHTML = resposta.id;
                    document.getElementById("nomcomb").innerHTML = resposta.combatente.nome;
                    document.getElementById("linhacred").innerHTML = resposta.linhacredito.designacao;
                    document.getElementById("numcomb").innerHTML = resposta.combatente.numeroCombatente;
                    document.getElementById("motante").innerHTML = resposta.montante;
                    document.getElementById("data").innerHTML = resposta.data;
                    document.getElementById("funcio").innerHTML = resposta.user.name;
                    $('#myModal').modal('show');
                },
                error: function (er) {
                    //$("#sucesso").load(location.href + " #sucesso>*", "");
                    //$('#sucesso').text('Projecto nao foi gravado');
                    alert("Ocoreu algum erro...");
                    console.log(er);
                }
            });
    }
</script>

@endsection
