@extends('layouts.admin')
<?php $message=Session::get('message') ?>
@section('content')
	@include('gender.alerts.alerts')
	<table class="table">
		<thead>
			<th>Nombre</th>	
			<th>Opciones</th>
		</thead>
		@foreach($genders as $gender)
		<tbody>
			<td>{{$gender->genre}}</td>
			<td>
				{!!link_to_route('gender.edit', $title = 'Editar', $parameters = [$gender->id], $attributes = ['class'=>'btn btn-primary'])!!}
           		<form style="display:inline;" action="{{route('gender.destroy',$gender->id)}}" method="post">
           			<input type="hidden" name="_method" value="DELETE">
           			<input type="hidden" name="_token" value="{{ csrf_token() }}">
           			<button class="btn btn-danger ">Eliminar</button>

           		</form>
           	</td>
		</tbody>
		@endforeach
	</table>
	{!!$genders->render()!!}
@endsection