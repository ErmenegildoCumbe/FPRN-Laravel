

@extends('layouts.template')

@section('content')

<div class="well">
    <select id="parametro">
        <option value="null">___Novo Paramentro___</option>
        <option value="areaactuacaofundo">Actividade</option>
        <option value="provincia">Provincia</option>
        <option value="tipomutuario">Tipo Requerente</option>
        <option value="sexo">Sexo</option>
    </select>
    <i id="addParammeter" style="cursor: pointer; margin-left: 5px; margin-top: 5px;" class="icon-2x icon-plus-sign-alt"></i>
    <button class="btn btn-success pull-right" onclick="gerarGrafico()">Gerar Grafico</button>
</div>

<div class="well">
    <div id="listaParamentros">

    </div>
</div>

<div class="row">
    <div class="span12">

        <div class="widget widget-table action-table">
            <div class="widget">
                <div class="widget-header">
                    <i class="icon-bar-chart"></i>
                    <h3>Bar Chart</h3>
                </div>
                <!-- /widget-header -->
                <div class="widget-content">
                    <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                    <!-- /bar-chart -->
                </div>
                <!-- /widget-content -->
            </div>
            <!-- /widget-content --> 
        </div>

    </div> 
</div>
<!-- /row -->

<script src="{{ asset('js/highcharts/highcharts.js') }}"></script> 
<script src="{{ asset('js/highcharts/exporting.js') }}"></script> 


<script type="text/javascript">
        var valor = "";
        var listaParametro = [];
        var listaValue = [];
        function currentValue() {
            var v = [];
            for (i = 0; i < listaParametro.length; i++) {
                v.push($('#' + listaParametro[i]).val());
                // alert(v);
            }
            return v;
        }

        $('#addParammeter').click(function () {
            //alert("cliquei");
            var valor = $('#parametro').val();
            if (valor == "sexo") {
                var t = '';
                t += '<select id="sexo">';
                t += '    <option> Por Sexo</option>';
                t += '    <option value="masculino">Masculino</option>';
                t += '    <option value="femenino" >Femenino</option>';
                t += '</select>';
                t += '<i id="sexoI" onclick="sexoI()" style="cursor: pointer; margin-left: 5px; margin-right: 10px;" class="icon-2x icon-remove-sign"></i>'
                $('#listaParamentros').append(t);
                listaParametro.push('sexo');
            }
            if (valor == "actividade") {
                var t = '';
                t += '<select id="actividade">';
                t += '    <option>__Actividade</option>';
                t += '    <option>Pecuaria</option>';
                t += '    <option>Agricultura</option>';
                t += '</select>';
                t += '<i id="actividadeI" onclick="actividadeI()" style="cursor: pointer; margin-left: 5px; margin-right: 10px;" class="icon-2x icon-remove-sign"></i>'
                $('#listaParamentros').append(t);
                listaParametro.push('actividade');
            }

            if (valor == "provincia") {
                var t = '';
                t += '<select id="provincia">';
                t += '    <option>Por Provincia</option>';
                t += '    <option value="Maputo">Maputo</option>';
                t += '    <option value="Gaza">Gaza</option>';
                t += '    <option value="Inhambane">Inhambane</option>';
                t += '    <option value="Sofala">Sofala</option>';
                t += '    <option value="Manica">Manica</option>';
                t += '    <option value="Tete">Tete</option>';
                t += '    <option value="Zambézia">Zambézia</option>';
                t += '    <option value="Nampula">Nampula</option>';
                t += '    <option value="Niassa">Niassa</option>';
                t += '    <option value="Cabo Delgado">Cabo Delgado</option>';
                t += '</select>';
                t += '<i id="provinciaI" onclick="provinciaI()" style="cursor: pointer; margin-left: 5px; margin-right: 10px;" class="icon-2x icon-remove-sign"></i>'
                $('#listaParamentros').append(t);
                listaParametro.push('provincia');
            }

            if (valor == "areaactuacaofundo") {
                var t = '';
                t += '<select id="areaactuacaofundo">';
                t += '    <option>Por Area Actuacao</option>';
                t += '    <option value="Actividade Mineira">Actividade Mineira</option>';
                t += '    <option value="Actividades da Agricultura" >Actividades da Agricultura</option>';
                t += '    <option value="Agro-Processamento" >Agro-Processamento</option>';
                t += '    <option value="Apicultura" >Apicultura</option>';
                t += '    <option value="Artesanato" >Artesanato</option>';
                t += '    <option value="Avicultura" >Avicultura</option>';
                t += '    <option value="Comércio" >Comércio</option>';
                t += '    <option value="Indústria e Serviços" >Indústria e Serviços</option>';
                t += '    <option value="Industrias Culturais e Criativas" >Industrias Culturais e Criativas</option>';
                t += '    <option value="Pecuária" >Pecuária</option>';
                t += '    <option value="Pesca" >Pesca</option>';
                t += '    <option value="Silvicultura" >Silvicultura</option>';
                t += '    <option value="Turismo" >Turismo</option>';
                t += '</select>';
                t += '<i id="areaactuacaofundoI" onclick="areaactuacaofundoI()" style="cursor: pointer; margin-left: 5px; margin-right: 10px;" class="icon-2x icon-remove-sign"></i>'
                $('#listaParamentros').append(t);
                listaParametro.push('areaactuacaofundo');
            }

            if (valor == "tipomutuario") {
                var t = '';
                t += '<select id="tipomutuario">';
                t += '    <option>Por Tipo Mutuario</option>';
                t += '    <option value="desmobilizado de guerra">Desmobilizado de guerra</option>';
                t += '    <option value="antigo combatente" >Antigo Combatente</option>';
                t += '</select>';
                t += '<i id="tipomutuarioI" onclick="tipomutuarioI()" style="cursor: pointer; margin-left: 5px; margin-right: 10px;" class="icon-2x icon-remove-sign"></i>'
                $('#listaParamentros').append(t);
                listaParametro.push('tipomutuario');
            }

        });
</script>                


<script type="text/javascript">
    function gerarGrafico() {
        /*  var j = listaParametro[0];
         alert(j);*/
        var listavalores = currentValue();

        var url2 = "<?php echo site_url("Reporte_controller/gerarGrafico") ?>";
        $.ajax({
            url: url2,
            type: "POST",
            data: {parametro: listaParametro, valores: listavalores},
            success: function (data)
            {
                //alert("Sucesso");
                chartBase(listaParametro, listavalores, jQuery.parseJSON(data));
                //console.log(jQuery.parseJSON(data));
            }
            ,
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error');
            }
        });
    }

    function chartBase(listaParamentro, listaValor, dadosPedidos) {
        var filtro = listaParamentro[0];

        var url = "<?php echo site_url("Reporte_controller") ?>" + "/" + filtro;
        $.ajax({
            url: url,
            type: "POST",
            data: {},
            success: function (data)
            {
                //alert("Sucesso");
                chart(listaParamentro, listaValor, jQuery.parseJSON(data), dadosPedidos)
                //console.log(jQuery.parseJSON(data));
            }
            ,
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error');
            }
        });
    }

    function chart(listaParametro, listaValores, dadosBase, dadosPedidos) {
        //console.log(listaParametro);
        var dadosGrafico = [];
        var dadosBaseF = [];
        var parametro = listaParametro[0];


        for (i = 0; i < dadosBase.length; i++) {
            dadosBaseF.push(dadosBase[i][parametro]);
        }

        for (i = 0; i < dadosBase.length; i++) {
            var count = 0;
            $.each(dadosPedidos, function (index) {
                // console.log(parametro);
                if (dadosPedidos[index][parametro] == dadosBase[i][parametro]) {
                    //console.log("true");
                    var cont = 0;
                    for (j = 1; j < listaParametro.length; j++) {
                        var param = listaParametro[j];
                        eval("if(dadosPedidos[index][param] == listaValores[j]){ cont = cont + 1; }else{ cont = cont + 0; }");
                    }
                    if (listaParametro.length - 1 == cont) {
                        count++;
                    }
                } else {
                    //console.log("false");
                }
            });
            dadosGrafico.push(count);
        }

        char(dadosBaseF, dadosGrafico);
    }



    function char(dadosX, dados) {
        console.log((dados));
        Highcharts.chart('container2', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Pedidos'
            },
            subtitle: {
                text: 'Source: Sistema'
            },
            xAxis: {
                categories: dadosX,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Valores'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} mt</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                    name: 'Dados',
                    data: dados

                }]
        });
    }
</script>

<script type="text/javascript">
    function sexoI() {
        $('#sexo').remove();
        $('#sexoI').remove();
        removeParamtro("sexo");
    }

    function provinciaI() {
        $('#provinciaI').remove();
        $('#provincia').remove();
        removeParamtro("provincia");
    }

    function actividadeI() {
        $('#areaactuacaofundoI').remove();
        $('#areaactuacaofundo').remove();
        removeParamtro("areaactuacaofundo");
    }


    function tipomutuarioI() {
        $('#tipomutuarioI').remove();
        $('#tipomutuario').remove();
        removeParamtro("tipomutuario");
    }

    function removeParamtro(removeElement) {
        for (var i = listaParametro.length - 1; i >= 0; i--) {
            if (listaParametro[i] === removeElement) {
                listaParametro.splice(i, 1);
            }
        }
    }
</script>
@endsection

