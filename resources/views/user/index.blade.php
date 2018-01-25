@extends('layouts.admin')
<?php $message=Session::get('message') ?>
@section('content')
	@include('user.alerts.alerts')
	<table class="table">
		<thead>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Operaciones</th>	
		</thead>
		<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td>
				{!!link_to_route('user.edit', $title = 'Editar', $parameters = [$user->id], $attributes = ['class'=>'btn btn-primary'])!!}
           		<form style="display:inline;" action="{{route('user.destroy',$user->id)}}" method="post">
           			<input type="hidden" name="_method" value="DELETE">
           			<input type="hidden" name="_token" value="{{ csrf_token() }}">
           			<button class="btn btn-danger ">Eliminar</button>

           		</form>
           	</td>
		</tr>			
		@endforeach
		</tbody>
	</table>
	{!!$users->render()!!}
@endsection