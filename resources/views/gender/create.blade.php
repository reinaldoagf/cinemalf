@extends('layouts.admin')
@section('content')
	<section>
	    	<div class="">
	    		<h1>Registrar genero</h1>
	    		@include('alerts.request')
	    		@include('alerts.errors')
	    		@include('gender.alerts.success')
	    		@include('gender.alerts.alerts')
				
	    		<!-- FORMULARIO PARA REGISTRAR GENERO -->
				<!-- !!Form::open(['class'=>'form','method'=>'post','route'=>'gender.store'])!! -->
				<!-- FORMULARIO PARA REGISTRAR GENERO (AJAX)-->
				{!!Form::open()!!}
				
				<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
					@include('gender.forms.gender')
					<!-- LINK PARA REGISTRAR GENERO (AJAX)-->
					{!!link_to('#',$title='Registrar',$attributes=['id'=>'registro','class'=>'btn btn-primary'],$secure=null)!!}
					<!-- SUBMIT PARA REGISTRAR GENERO -->
					<!-- !!Form::submit('Registrar',['class'=>'btn btn-primary'])!! -->
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
@section('scripts')
    {!!Html::script('js/createwithajax.js')!!}
@endsection