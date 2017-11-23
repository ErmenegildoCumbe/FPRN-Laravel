@extends('layouts.template')

@section('content')



<div class="row">
    <div class="span12">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Avalicao de pedido</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="container">
                    <div class="row">
                        <div class="span6">
                            <div class="widget big-stats-container">
                                <div class="widget-content" style="">
                                    <div>
                                         
                                            <form class="form-horizontal">
                                            	{{ csrf_field() }}
                                                <fieldset>
                                                    <div class="control-group">											
                                                        <label class="control-label" for="firstname">Rendimento</label>
                                                        <div class="controls">
                                                            <input class="span4" id="rendimento1"  value="{{ $pedido->combatente->rendimento }}" disabled/>
                                                            <input type="hidden" class="span4" id="rendimento"  value="{{ $pedido->combatente->rendimento }}" />
                                                        </div> <!-- /controls -->				
                                                    </div> <!-- /control-group -->

                                                    <div class="control-group">											
                                                        <label class="control-label" for="firstname">Montante Requisitado</label>
                                                        <div class="controls">
                                                            <input class="span4" id="montante1" value="{{ $pedido->montante }} " disabled/>
                                                            <input type="hidden" class="span4" id="montante" value="{{ $pedido->montante }} " />	
                                                        </div> <!-- /controls -->				
                                                    </div> <!-- /control-group -->

                                                    <div class="control-group">											
                                                        <label class="control-label" for="lastname">Tempo Pagamento Proposto</label>
                                                        <div class="controls">
                                                            <input class="span4" id="tempoproposto1" placeholder="Tempo Pagamento Proposto" value="{{ $pedido->tempoProposto }}" disabled />
                                                            <input type="hidden" class="span4" id="tempoproposto" value="{{ $pedido->tempoProposto }}" />
                                                        </div> <!-- /controls -->				
                                                    </div> <!-- /control-group -->

                                                    <div class="form-actions">
                                                        <button type="button" class="btn btn-primary" onclick="avaliarLoading()">Avaliar</button> 
                                                        <button  class="btn">Restaurar</button>
    <!--                                                        <a class="btn btn-success" href="<?php //echo site_url("PedidoEmprestimo_controller/preaprovacao/$value->idPedidoEmprestimo") ?>" >Aprovar</a> -->
                                                        <!-- <a class="btn btn-success" href="#myModal" role="button" data-toggle="modal">Aprovar</a> -->
                                                        <input type="button" class="btn btn-success" id="paraAprovar" value="Aprovar" name="">
                                                    </div> <!-- /form-actions -->
                                                </fieldset>
                                            </form>
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span5">
                            <div class="row">
                                <div id="resultadoAvalicao" class="span6">

                                </div>
                                <div id="resultado1" class="span3">
                                    <!--                                    <h3 style="margin-top: 55px">Tempo Minimo Necessario</h3>
                                                                        <hr>
                                                                        <h3 style="margin-left: 35%">25</h3>-->
                                </div>
                                <div id="resultado2" class="span3">
                                    <!--                                    <h3 style="margin-top: 55px; margin-left: 20%">Valor Possivel</h3>
                                                                        <hr>
                                                                        <h3 style="margin-left: 39%">25</h3>-->
                                </div>
                            </div>
                        </div>  
                    </div>    
                </div>
            </div>
            <!-- /widget-content --> 
        </div>
    </div>
</div>
<!-- /row -->

<!-- Modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Confirmar valor a ser disponibilizado</h3>
    </div>
    <form action="<?php //echo site_url("PedidoEmprestimo_controller/preaprovacao/$value->idPedidoEmprestimo") ?>" method="post">
    	{{ csrf_field() }}
        <div class="modal-body">
            <div class="form">
                <Labe>Tempo Pagamento</Labe>
                <input type="text" style="margin-left: 45px" class="form-control" name="tempo" placeholder="introduza o tempo pagamento" required>
            </div>

            <div class="form">
                <Labe>Valor a ser Disponibilizado</Labe>
                <input type="text" class="form-control" name="valor" placeholder="introduza o valor a ser disponibilizado" required>
            </div>
            <div class="form" style="display: none">
                <input type="text" class="form-control" value="30" name="tempoPagamentoInicial" placeholder="introduza o valor a ser disponibilizado">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary">Salvar</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        </div>
    </form>
</div>

<!-- Scripts -->
<script type="text/javascript">
	 $('#paraAprovar').click(function () {
	 	$('#myModal').modal('show');
	 });
    function avaliarLoading() {
        $('#resultadoAvalicao').empty();
        $('#resultado1').empty();
        $('#resultado2').empty();
        var t = '<img style="margin-left: 25%" src="{{ asset("img/loading.gif") }} "/>'
        $('#resultadoAvalicao').append(t);
        setTimeout(function () {
            avaliar();
        }, 1000);

    }

    function avaliar() {
        $('#resultadoAvalicao').empty();
        $('#resultado1').empty();
        $('#resultado2').empty();

        var montante = $('#montante').val();
        var tempo = $('#tempoproposto').val();
        var rendimento = $('#rendimento').val();
       

        var x = rendimento / 3;
        var y = (parseFloat(montante) + parseFloat((montante * 0.45))) / parseFloat(tempo);
        //console.log(y);
        if (x >= y) {
            var t = '';
            t += '<i style="margin-left: 42%" class="btn btn-success icon-5x icon-ok"></i>';
            $('#resultadoAvalicao').append(t);
        } else {
            var time = 0;
            for (var i = 0; i < 60; i++) {
                var z = (parseFloat(montante) + parseFloat((montante * 0.45))) / i;
                if (x >= z) {
                    time = i;
                    break;
                }
            }

            var t = '';
            t += '<i style="margin-left: 42%" class="btn btn-danger icon-5x icon-remove"></i>';
            $('#resultadoAvalicao').append(t);


            if (time > 0) {
                var s = '';
                s += '<h3 style="margin-top: 55px">Tempo Minimo Necessario</h3>';
                s += '<hr>'
                s += '<h3 style="margin-left: 35%">' + time + 'Meses</h3>'
                $('#resultado1').append(s);
            } else {
                var s = '';
                s += '<h3 style="margin-top: 55px">Tempo Minimo Necessario</h3>';
                s += '<hr>'
                s += '<h3 style="margin-left: 35%">Nao Viável</h3>';
                $('#resultado1').append(s);

                var vp = (((parseFloat(rendimento) / 3) * parseFloat(tempo)) * 100) / 145;
                var a = '';
                // a += '<h5>Valor Possivel: ' + Math.floor(vp) + '</h5>';
                a += '<h3 style="margin-top: 55px; margin-left: 20%">Valor Possivel</h3>';
                a += '<hr>'
                a += '<h3 style="margin-left: 35%">' + Math.floor(vp) + '</h3>';
                $('#resultado2').append(a);
            }
        }
    }
</script>



@endsection