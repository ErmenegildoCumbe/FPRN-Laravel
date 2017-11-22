@extends('layouts.template')

@section('content')
<div class="row">
    <div class="span12">
        <div class="widget widget-nopad">
            <div id="sucesso" style="width: 370px; color: green;font-size: 18px">
                                                                
            </div>
            <div class="widget widget-header">
              <h3>  Registo de Combatente </h3>
            </div>
            <div class="widget-content">
                <div class="widget big-stats-container">
                   <div class="widget-content" style="">
                        <div>
                            <form id="addcombatente">
                                {{ csrf_field() }}

                                <fieldset>
                                        <div class="span6">
                                            
                                                <div class="control-group form-group" >                                         
                                                    <label  for="nome">Nome</label>
                                                    <input class="form-control" name="nome" id="nome" placeholder="Exemplo: Ana" required=""/>

                                                </div> <!-- /control-group -->

                                                <div class="control-group form-group">                                         
                                                    <label  for="apelido">Apelido</label>
                                                    <input class="form-control" name="apelido" id="apelido" placeholder="Exemplo: Cuinhane" required=""/>

                                                </div> <!-- /control-group -->

                                                <div class="control-group form-group">                                         
                                                    <label  for="telefone">Telefone</label>
                                                    <input class="form-control" name="telefone" id="telefone" placeholder="Exemplo: 841234567" required=""/>

                                                </div> <!-- /control-group -->    
                                                <div class="control-group form-group">                                         
                                                    <label for="numeroCombatente">Numero de Combatente</label>
                                                    <input class="form-control" name="numeroCombatente" id="numeroCombatente" placeholder="Exemplo: 4555557" required=""/>

                                                </div> <!-- /control-group -->    
                                                <div class="control-group form-group">                                         
                                                    <label for="rendimento">Rendimento do Combatente</label>
                                                    <input class="form-control" name="rendimento" id="rendimento" placeholder="Exemplo: 5000" required=""/>

                                                </div> <!-- /control-group -->     

                                              
                                        </div>
                                        <div class="span5" style="padding-left: 20px;">
                                               <!--  <fieldset> -->
                                                <div class="control-group form-group">                                         
                                                    <label for="email">Email do Combatente</label>
                                                    <input class="form-control" name="email" id="email" placeholder="Exemplo: ana@gmail.com" required=""/>

                                                </div> <!-- /control-group -->     
                                                <div class="control-group form-group">
                                                    <label  for="tipoMutuario">Tipo de Mutuario</label>
                                                    <select class="span4" name="tipoMutuario" id="tipoMutuario">
                                                        <option value="Antigo Combatente">Antigo Combatente</option>    
                                                        <option value="Desmobilizado de Guerra">Desmobilizado de Guerra</option>  
                                                    </select>
                                                </div> <!-- /controls -->

                                            <div class="control-group form-group">
                                                  <label  for="sexo">Sexo</label>
                                                  <select class="span4" name="sexo" id="sexo">
                                                    <option value="Masculino">Masculino</option>    
                                                    <option value="Feminino">Feminino</option>  
                                                </select>
                                            </div> <!-- /controls --> 

                                           <div class="control-group form-group">
                                              <label for="provincia">Provincia</label>
                                              <select class="span4" name="provincia" id="provincia">
                                               @foreach($province as $provincia)
                                               <option value={{ $provincia->id}}>{{ $provincia->provincia}}</option>    

                                               @endforeach  
                                                </select>
                                            </div> <!-- /controls -->                                          
   
                                        </div>

                                        <div class="row span12">
                                            <div class="form-actions">
                                                <input type="button" class="btn btn-primary" id="addPedidoEmprestimo" value="Prosseguir">
                                                
                                                <a  href="<?php//      echo base_url('index.php/PedidoEmprestimo_controller/pesquisarCombatente') ?>" class="btn">Cancelar</a>
                                            </div> <!-- /form-actions -->
                                        </div>
                                
                                    </fieldset>
                            </form>
                        </div>
                    </div> 
                </div>
                
            </div>
        </div>    
    </div>
</div>

<script>
    
    $(function(){

        $('#addPedidoEmprestimo').click(function () {
            var data = $('#addcombatente').serialize();
            //console.log(data);
            $.ajax({
                type: 'jax',
                method: 'post',
                url: "{{ route('combatente.store')}}",
                data: data,
                //async: false,
                dataType: 'json',
                success: function (resposta) {
                   
                    // $('#sucesso').html('Projecto Adicionado com sucesso').fadeIn().delay(4000).fadeOut('show');
                    $('#sucesso').text("Combatente Adicionado com sucesso!");
                    window.location="{{ route('combatente.index') }}";
                    //document.getElementById("montante").innerHTML = $('#custoProjecto').val();
                    //document.getElementById("tempoProposto").innerHTML = $('#duracaoProjecto').val();
                },
                error: function (error) {
                   console.log(error);
                }
            });
        });



    });
</script>

@endsection