@extends('layouts.template')

@section('content')
	
	<form class="form-horizontal" action="<?php //echo base_url('index.php/PedidoEmprestimo_controller/gravarPedidoEmprestimo') ?>" method="post">
								{{ method_field('PUT') }}
                               {{ csrf_field() }}
                                
                                <div class="container">
                                    <div class="row">
                                        <div class="span6">
                                            <fieldset>
                                                <div class="control-group">											
                                                    <label class="control-label" for="nome"></label>
                                                    <input class="form-control" name="nome" id="nome" placeholder="Exemplo: Ana" required=""/>
                                                   			
                                                </div> <!-- /control-group -->

												<div class="control-group">											
                                                    <label class="control-label" for="apelido"></label>
                                                    <input class="form-control" name="apelido" id="apelido" placeholder="Exemplo: Cuinhane" required=""/>
                                                   			
                                                </div> <!-- /control-group -->

                                                <div class="control-group">											
                                                    <label class="control-label" for="telefone"></label>
                                                    <input class="form-control" name="telefone" id="telefone" placeholder="Exemplo: 841234567" required=""/>
                                                   			
                                                </div> <!-- /control-group -->    

                                                <div class="controls">
                                                        <select class="span4" name="sexo" id="sexo">
                                                            <option value="1">Masculino</option>    
                                                            <option value="2">Feminino</option>  
                                                        </select>
                                                    </div> <!-- /controls -->	

                                                  <div class="controls">
                                                        <select class="span4" name="tipoMutuario" id="tipoMutuario">
                                                            <option value="1">Antigo Combatente</option>    
                                                            <option value="2">Desmobilizado de Guerra</option>  
                                                        </select>
                                                    </div> <!-- /controls -->

                                                    <div class="control-group">											
                                                    <label class="control-label" for="numeroCombatente"></label>
                                                    <input class="form-control" name="numeroCombatente" id="numeroCombatente" placeholder="Exemplo: 4555557" required=""/>
                                                   			
                                                </div> <!-- /control-group -->	  

                                                <div class="controls">
                                                        <select class="span4" name="provincia" id="provincia">
                                                            <option value="Maputo">Maputo</option>    
                                                            <option value="Gaza">Gaza</option>
                                                            <option value="Inhambane">Inhambane</option>
                                                            <option value="Manica">Manica</option>
                                                            <option value="Sofala">Sofala</option>
                                                            <option value="Tete">Tete</option>
                                                            <option value="Zambézia">Zambézia</option>
                                                            <option value="Nampula">Nampula</option> 
                                                            <option value="Lichinga">Lichinga</option>
                                                            <option value="Cabo Delgado">Cabo Delgado</option>   
                                                        </select>
                                                    </div> <!-- /controls -->                                          

                                                

                                                <!-- <div class="control-group">	
                                                    <label class="control-label" for="Country">Rendimento Mensal<sup></sup></label>
                                                    <div class="controls">
                                                        <input class="span4" name="rendimento" placeholder="Exemplo: 5000" required=""/>
                                                    </div> <!-- /controls -->				
                                                <!--</div>  /control-group --> 

                                                                              

                                                <div class="form-actions">
                                                    <button class="btn btn-primary" id="addPedidoEmprestimo">Prosseguir</button> 
                                                    <a  href="<?php echo base_url('index.php/PedidoEmprestimo_controller/pesquisarCombatente') ?>" class="btn">Cancelar</a>
                                                </div> <!-- /form-actions -->

                                            </fieldset>
                                        </div>
                                        
                                    </div>
                                </div>

                            </form>

@endsection