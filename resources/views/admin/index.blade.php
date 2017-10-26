<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
?>

<div class="row">
    <div class="span6">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3> Pedidos de Emprestimos</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="widget big-stats-container">
                    <div class="widget-content">
                        <h6 class="bigstats">Numero de pedidos pre aprovados e por serem avaliados pela direcao</h6>
                        <div id="big_stats" class="cf">
                            <div class="stat"> <i class="icon-anchor"></i> <span class="value"><?php echo $numPedidosPorAvaliar ?></span> 
                            </div>
                            <!-- .stat --> 
                        </div>
                    </div>
                    <!-- /widget-content --> 

                </div>
            </div>
        </div>
        <!-- /widget -->
    </div>
    <div class="span6">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3> Emprestimos</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="widget big-stats-container">
                    <div class="widget-content">
                        <h6 class="bigstats">Numero de emprestimos em pagamento</h6>
                        <div id="big_stats" class="cf">
                            <div class="stat"> <i class="icon-anchor"></i> <span class="value"><?php echo $numEmprestimosEmPagamento ?></span> </div>
                            <!-- .stat -->
                        </div>
                    </div>
                    <!-- /widget-content -->
                </div>
            </div>
        </div>
        <!-- /widget -->
    </div>
    <div class="span6">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3> Utilizadores</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="widget big-stats-container">
                    <div class="widget-content">
                        <h6 class="bigstats">Numero total de funcionarios autoriazados a usar o sistema</h6>
                        <div id="big_stats" class="cf">
                            <div class="stat"> <i class="icon-user"></i> <span class="value"><?php echo $numUtilizador ?></span> </div>
                            <!-- .stat --> 
                        </div>
                    </div>
                    <!-- /widget-content --> 

                </div>
            </div>
        </div>
        <!-- /widget -->
    </div>
</div>
<!-- /row -->
<?php
$data['conteudo'] = ob_get_contents();
ob_end_clean();
$this->load->view("dir/template/template", $data);
?>

