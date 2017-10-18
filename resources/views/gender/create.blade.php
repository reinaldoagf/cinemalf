@extends('layouts.admin')
@section('content')
	<section>
	    	<div class="">
	    		<h1>Registrar genero</h1>
	    		@include('alerts.request')
	    		@include('gender.alerts.alerts')
				{!!Form::open(['class'=>'form','method'=>'post','route'=>'gender.store'])!!}
					@include('gender.forms.gender')
					{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
				{!!Form::close()!!}
			</div>
	</section>
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