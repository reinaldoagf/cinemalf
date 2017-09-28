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
		<div class="form-group">
			{!!Form::label('Tipo de usuario')!!}
			{!!Form::select('typeofuser', ['Admin' => 'Usuario Administrador', 'Sistem' => 'Usuario del Sistema'],null,['placeholder'=>'Seleccione el tipo de usuario','class'=>'form-control btn-default'])!!}
		</div>