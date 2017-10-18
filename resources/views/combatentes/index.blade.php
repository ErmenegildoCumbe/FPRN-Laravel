@extends('layouts.template')

@section('content')

	<div class="container">
	<div class="row">
  <div class="row col-md-12 col-sm-12 col-12 col-md-offset-2 custyle">
  <table class="table table-striped custab">
  <thead>
  <a href="{{ route('combatente.create') }}" class="btn btn-primary btn-xs pull-right"><b>+</b> Adicionar Combatente</a>
      <tr>
         <!--  <th>ID</th> -->
          <th>Nome</th>
          <th>Apelido</th>
          <th>Telefone</th>
          <th>Sexo</th>
          <th>Tipo de Mutuario</th>
          <th>Número de Combatente</th>
          <th class="text-center">Ações</th>
      </tr>
  </thead>
      <tbody>
 @foreach($combatentes as $combatente)
          <tr>
              <!-- <td>{{$combatente->id}}</td> -->
              <td>{{$combatente->nome }}</td>
              <td>{{$combatente->apelido}}</td>
              <td>{{$combatente->telefone}}</td>
              <td>{{$combatente->sexo}}</td>
              <!-- <td>{{$combatente->telefone}}</td> -->
              <td>{{$combatente->tipoMutuario}}</td>
              <td>{{$combatente->numeroCombatente}}</td>

              <td class="text-center"><a class='btn btn-info btn-xs' href="{{ route('combatente.edit',$combatente->id) }}">
               <span class="glyphicon glyphicon-edit"></span> Editar</a>
               <a href="/eliminar-disciplina/{{$combatente->id}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Eliminar</a>
               {{ method_field('DELETE') }}
               </td>
          </tr>
          @endforeach
      </tbody>
  </table>
  </div>
  </div>
</div>

@endsection