@extends('layouts.template')

@section('content')

<div class="row">
    <div class="span12">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3> Procurar Combatente</h3>
            </div>

            <div class="widget-content">
                <div class="widget big-stats-container">
                    <div>
                        <form id="formPesquisar" class="form-horizontal" action="<?php //echo base_url('index.php/PedidoEmprestimo_controller/sendCampoPesquisar') ?>" method="post">
                             {{ csrf_field() }}
                            <fieldset>
                                <br>
                                <div class="control-group">											
                                    <label class="control-label" for="firstname">Nome/Apelido ou Nr<sup></sup></label>
                                    <div class="controls">
                                        <input class="span4" id="term" name="term" placeholder="Procurar pelo nome/apelido/Nr. Combatente" />	
                                    </div> <!-- /controls -->				
                                </div> <!-- /control-group -->
                                <div class="form-actions">
                                    <button type="button" class="btn btn-primary btn-large" id="btnBuscar">Buscar</button> 
                                </div> <!-- /form-actions -->                              

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/span 12-->

    <div class="span12">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Combatentes</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <table class="table table-striped table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th> Numero do Combatente </th>
                            <th> Nome</th>
                            <th> Apelido</th>
                            <th> Contacto</th>
                            <th> Genero</th>
                            <th> Provincia</th>
                            <th class="td-actions"> </th>
                        </tr>
                    </thead>
                    <tbody id="showdata">
                    </tbody>
                </table>
            </div>
            <!-- /widget-content --> 
        </div>
    </div>
</div>
<!-- /row -->
<script>
    //autocomplete
    // $(function () {
    //     $("#term").autocomplete({
    //         source: "<?php// echo base_url('index.php/PedidoEmprestimo_controller/returnCombatenteAutoComplete') ?>"
    //     });
    // });
    
    //listar combatentes encontrados
    $(function () {

        $('#btnBuscar').click(function () {
            var dataSend = $('#formPesquisar').serialize();
            //console.log("chegou aqui");
            visualizarCombatentes(dataSend);
        });

        //funcao que visualiza ista de combatentes buscados na hora da pesquisa
        function  visualizarCombatentes(dataSend) {
              //console.log("chegou aqui no ajax...");
            $.ajax({
                //type: 'jax',
                method: 'get',
                url: '/combatentes',
                //data: 'null',
                //async: false,
               // dataType: 'json',
                success: function (data) {
                    var html = '';
                    var i;
                    var id=0;
                    for (i = 0; i < data.length; i++) {
                       // id=data[i].id;
                         //console.log(data[i].id);
                        // console.log(i);
                        html += '<tr>' +
                                '<td>' + data[i].numeroCombatente + '</td>' +
                                '<td>' + data[i].nome + '</td>' +
                                '<td>' + data[i].apelido + '</td>' +
                                '<td>' + data[i].telefone + '</td>' +
                                '<td>' + data[i].sexo + '</td>' +
                                '<td>' + data[i].provincias_id + '</td>' +
                                '<td>' +
                                '<a href= "/pedidoemprestimos/'+data[i].id+'" class="btn btn-success">Seleccionar</a>' +
                                '</td>' +
                                '</tr>';
                    }
                    $('#showdata').html(html);
                },
                error: function () {
                    alert('Nao conseguir fazer retrive da base de dados');
                }
            });
        }
    });

</script>

@endsection
