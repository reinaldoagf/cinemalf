@extends('layouts.admin')
@section('content')
	{!!Form::open(['class'=>'form','method'=>'post','route'=>'user.store'])!!}
		<div class="form-group">
			{!!Form::label('Nombre')!!}
			{!!Form::text('name',null,['placeholder'=>'Nombre','class'=>'form-control'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Correo')!!}
			{!!Form::text('email',null,['placeholder'=>'Correo','class'=>'form-control'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Contraseña')!!}
			{!!Form::password('password',['placeholder'=>'Contraseña','class'=>'form-control'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Repetir Contraseña')!!}
			{!!Form::password('repeatPassword',['placeholder'=>'Repetir Contraseña','class'=>'form-control'])!!}
		</div>
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	<!--
	<form>
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" class="form-control" name="">
		</div>
		<div class="form-group">
			<label for="">Correo</label>
			<input type="text" class="form-control" name="">
		</div>
		<div class="form-group">
			<label for="">Contraseña</label>
			<input type="password" class="form-control" name="">
		</div>	
		<div class="form-group">
			<label for="">Repite la Contraseña</label>
			<input type="password" class="form-control" name="">
		</div>
		<button class="btn btn-primary">Registrar</button>
	</form>
	-->
@endsection