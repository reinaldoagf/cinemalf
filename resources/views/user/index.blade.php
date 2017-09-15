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
		@foreach($users as $user)
		<tbody>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td></td>
		</tbody>
		@endforeach
	</table>
@endsection