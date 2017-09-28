@extends('layouts.admin')
@section('content')
	    <section>
	    	<div class="">
	    		<h1>Actualizar usuario</h1>
				{!!Form::model($user,['class'=>'form','route'=>['user.update',$user->id],'method'=>'put'])!!}
					@include('user.forms.user')
					<div class="form-group">
		    			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
						{!!Form::close()!!}
					</div>
	    	</div>    	
	    </section>
    </body>
</html>
@endsection