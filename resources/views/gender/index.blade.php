@extends('layouts.admin')
<?php $message=Session::get('message') ?>
@section('content')
	@include('gender.alerts.alerts')
	@include('gender.modal')
	<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
  		 Genero <strong>Actualizado</strong> Correctamente.
	</div>
	<div id="msj-danger" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
  		 Genero <strong>Eliminado</strong> Correctamente.
	</div>
	<!-- =================CARGANDO TABLA DE GENEROS REGISTRADOS (AJAX) -->
	<table class="table">
		<thead>
			<th>Nombre</th>	
			<th>Opciones</th>
		</thead>
		<tbody id="data">
			
		</tbody>
	</table>
	<!-- =================CARGANDO TABLA DE GENEROS REGISTRADOS -->
	<!-- <table class="table">
		<thead>
			<th>Nombre</th>	
			<th>Opciones</th>
		</thead>
		foreach($genders as $gender)
		<tbody>
			<td>{$gender->genre}</td>
			<td>
				!!link_to_route('gender.edit', $title = 'Editar', $parameters = [$gender->id], $attributes = ['class'=>'btn btn-primary'])!!
           		<form style="display:inline;" action="{route('gender.destroy',$gender->id)}" method="post">
           			<input type="hidden" name="_method" value="DELETE">
           			<input type="hidden" name="_token" value="{{ csrf_token() }}">
           			<button class="btn btn-danger ">Eliminar</button>

           		</form>
           	</td>
		</tbody>
		endforeach
	</table> 
	!!$genders->render()!!-->
@endsection
@section('scripts')
    {!!Html::script('js/readwithajax.js')!!}
@endsection