@extends('layouts.admin')
@section('content')
	    <section>
	    	<div class="">
	    		<h1>Actualizar genero</h1>
				{!!Form::model($gender,['class'=>'form','route'=>['gender.update',$gender->id],'method'=>'put'])!!}
					@include('gender.forms.gender')
					<div class="form-group">
		    			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
						{!!Form::close()!!}
					</div>
	    	</div>    	
	    </section>
    </body>
</html>
@endsection