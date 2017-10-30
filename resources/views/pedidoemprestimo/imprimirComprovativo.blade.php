@extends('layouts.template')

@section('content')




<div class="row">
    <div class="span12">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3>Imprimir Comprovativo de Pedido de Emprestimo</h3>
            </div>

            <div class="widget-content">
                <div class="widget big-stats-container">
                    <div class="widget-content" style="padding:10px;">
                        <div>
                            <div class="alert alert-success" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only"><img src="{{ asset('img/checkedNotificar.png') }}" width="30px" alt=""/></span>  
                                Pedido Foi submetido com sucesso
                            </div>
                            <h3>Imprimir Comprovativo</h3>
                            <div id="imprimir">
                                <center>  
                                    <img src="{{ asset('img/logo_login.jpg') }}" width="170px"alt=""/><br>                  
                                    <h3>
                                        NUIT: 10001452<br>
                                        REPÚBLICA DE MOÇAMBIQUE<br>
                                        Fundo da Paz e Reconciliação Nacional<br><br>
                                        Comprovativo<br>
                                        ----------------------------------------------------------------------------------------------------------------<br>
                                    </h3>
                                    <h4>
                                        <span class="pull-left"> Número de Pedido: {{ $pedidoemprestimo->id }}</span><i class="pull-right">Data: {{ $pedidoemprestimo->data }}</i>  <br>
                                        <span class="pull-left"> Nome do Combatente: {{ $pedidoemprestimo->combatente->nome }} {{ $pedidoemprestimo->combatente->apelido }}</span><span class="pull-right">Número do Combatente: {{ $pedidoemprestimo->combatente->numeroCombatente }}</span><br>
                                        ------------------------------------------------------------------------------------------------------------------------------------------------
                                    </h4>
                                </center>
                                <BR> <BR> <BR>
                                <b>DETALHES DO PEDIDO</b>
                                <table >
                                    <tr>
                                        <td>Linha de Credito</td>
                                        <td>{{ $pedidoemprestimo->linhacredito->designacao }}</td>
                                    </tr>
                                    <tr>
                                        <td>Montante Solicitado</td>
                                        <td> {{ $pedidoemprestimo->montante }},00Mt</td>
                                    </tr>
                                    <tr>
                                        <td>Declaração de rendimento mensal </td>
                                        <td> {{ $pedidoemprestimo->rendimento }},00Mt</td>
                                    </tr>
                                    <tr>
                                        <td>Periodo de Pagamento</td>
                                        <td>
                                            <?php
                                            $tempoProposto =  $pedidoemprestimo->tempoProposto ;
                                            if ($tempoProposto == 12) {
                                                echo '1 Ano';
                                            } else if ($tempoProposto == 24) {
                                                echo '2 Anos';
                                            } else if ($tempoProposto == 36) {
                                                echo '3 Anos';
                                            } else if ($tempoProposto == 48) {
                                                echo '4 Anos';
                                            } else if ($tempoProposto == 60) {
                                                echo '5 Anos';
                                            } else {
                                                echo $tempoProposto.' Meses';
                                            }
                                            ?></td>
                                    </tr>
                                </table>
                                ----------------------------------------------------------------------------------------------------------------------------------------------------------
                                <br><br>
                                Atendente: {{ $pedidoemprestimo->user->name }} {{ $pedidoemprestimo->user->apelido }}
                                <br><br><br>
                                <center>
                                    ___________________________________________<br>
                                    (Assinatura)
                                </center>
                            </div>
                            <div class="form-actions"> 
                                <button  class="btn" onclick="printContent('imprimir')">Imprimir Comprovativo</button> 
                                <a href="/" class="btn btn-primary">Novo Pedido Emprestimo</a>                                         
                                <a  href="{{ route('pedidoempresti') }}<?php //echo base_url('index.php/PedidoEmprestimo_controller/getPedidoByMes/'); ?>" class="btn btn-success"> Lista de Pedidos </a>
                            </div> <!-- /form-actions -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/span 12-->
    <script>
        function printContent(el) {
            var restorepage = document.body.innerHTML;
            var printContent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = restorepage;

        }
    </script>

</div>
<!-- /row -->
<?php 
//$data['conteudo'] = ob_get_contents();
//ob_end_clean();
//$this->load->view("template/template", $data);
?>



@endsection