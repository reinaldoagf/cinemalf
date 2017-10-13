@extends('layouts.admin')
@section('content')
	    <section>
	    	<div class="">
	    		<h1>Actualizar pelicula</h1>
				{!!Form::model($movie,['class'=>'form','route'=>['movie.update',$movie->id],'method'=>'put'])!!}
					@include('movie.forms.movie')
					<div class="form-group">
		    			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
						{!!Form::close()!!}
					</div>
	    	</div>    	
	    </section>
    </body>
</html>
@endsection