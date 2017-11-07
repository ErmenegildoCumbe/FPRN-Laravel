@extends('layouts.template')

@section('content')

<div class="row">
    <div class="span12">
        <!--        <div class="well">
                    <select id="sexo">
                        <option>masculino</option>
                        <option>femenino</option>
                    </select>
                </div>-->

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
                            <th> Montante Disponibilizado</th>
                            <th>Estado</th>
                            <th class="td-actions"> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listaPedidos as $value): ?>
                            <tr>
                                <td> <?php echo $value->nome . " " . $value->apelido ?> </td>
                                <td> <?php echo $value->montante ?> </td>
                                <td><?php echo $value->montanteDisponibilizado; ?></td>
                                <?php if ($value->pedidoestado == 0) { ?>
                                    <td><span class="btn-warning btn-small">pendente</span></td>
                                <?php } ?>
                                <?php if ($value->pedidoestado == 1) { ?>
                                    <td><span class="btn-info btn-small">em avaliacao</span></td>
                                <?php } ?>
                                <?php if ($value->pedidoestado == 2) { ?>
                                    <td><span class="btn-primary btn-small">pre-aprovado</span></td>
                                <?php } ?>
                                <?php if ($value->pedidoestado == 3) { ?>
                                    <td><span class="btn-success btn-small">aprovado</span></td>
                                <?php } ?>
                                <?php if ($value->pedidoestado == 4) { ?>
                                    <td><span class="btn-danger btn-small">reprovado</span></td>
                                <?php } ?>
                                <td class="td-actions">
                                    <a href="<?php //echo site_url("PedidoEmprestimo_controller/aprovarDir/$value->idEmprestimo/$value->idPedidoEmprestimo") ?>" class="btn btn-success btn-small"><i class="icon-ok"></i></a>
                                    <a href="<?php //echo site_url("PedidoEmprestimo_controller/reprovarDir/$value->idEmprestimo/$value->idPedidoEmprestimo") ?>" class="btn btn-danger btn-small"><i class="icon-remove"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /widget-content --> 
        </div>
    </div>
</div>
<!-- /row -->

<!--<script type="text/javascript">
    $(function () {
        $("#procurar").keyup(function () {
            var index = $(this).parent().index();
            var nth = "#tabela td:nth-child(" + (index + 1).toString() + ")";
            var valor = $(this).val().toUpperCase();
            $("#tabela tbody tr").show();
            $(nth).each(function () {
                if ($(this).text().toUpperCase().indexOf(valor) < 0) {
                    $(this).parent().hide();
                }
            });
        });

        $("#procurar").blur(function () {
            $(this).val("");
        });
    });
</script>-->
<script type="text/javascript">
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

