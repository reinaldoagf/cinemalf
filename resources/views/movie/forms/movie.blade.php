<div class="form-group">
			{!!Form::label('Nombre')!!}
			{!!Form::text('name',null,['placeholder'=>'Nombre','class'=>'form-control'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Casting')!!}
			{!!Form::text('cast',null,['placeholder'=>'Casting','class'=>'form-control'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Direccion')!!}
			{!!Form::text('direction',null,['placeholder'=>'Direccion','class'=>'form-control'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Duracion')!!}
			{!!Form::text('duration',null,['placeholder'=>'Duracion','class'=>'form-control'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Genero')!!}
			{!!Form::select('genre_id', $genders,null,['placeholder'=>'Seleccione el genero de la pelicula','class'=>'form-control btn-default'])!!}
		</div>