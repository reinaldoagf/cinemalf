@extends('layouts.admin')
<?php $message=Session::get('message') ?>
@section('content')
	@include('movie.alerts.alerts')
	<table class="table">
		<thead>
			<th>Nombre</th>
			<th>Casting</th>
			<th>Dirección</th>
			<th>Duración</th>
			<th>Genero</th>
			<th>Opciones</th>		
		</thead>
		@foreach($movies as $movie)
		<tbody>
			<td>{{$movie->name}}</td>
			<td>{{$movie->cast}}</td>
			<td>{{$movie->direction}}</td>
			<td>{{$movie->duration}}</td>
			<td>{{$movie->genre_id}}</td>
			<td>
				{!!link_to_route('movie.edit', $title = 'Editar', $parameters = [$movie->id], $attributes = ['class'=>'btn btn-primary'])!!}
           		<form style="display:inline;" action="{{route('movie.destroy',$movie->id)}}" method="post">
           			<input type="hidden" name="_method" value="DELETE">
           			<input type="hidden" name="_token" value="{{ csrf_token() }}">
           			<button class="btn btn-danger ">Eliminar</button>

           		</form>
           	</td>
		</tbody>
		@endforeach
	</table>
	{!!$movies->render()!!}
@endsection