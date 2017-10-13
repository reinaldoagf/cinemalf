<?php  $message=Session::get('message') ?>
@if($message=='store')
<div class="alert alert-success alert-dismissible">
  <a href="{!!URL::to('/user')!!}" class="close" data-dismiss="alert" aria-label="close">&times;</a></span></button>Pelicula <strong>registrada</strong>  satisfactoriamente.
</div>
@elseif ($message=='update')
<div class="alert alert-success alert-dismissible">
  <a href="{!!URL::to('/user')!!}" class="close" data-dismiss="alert" aria-label="close">&times;</a></span></button>Pelicula <strong>actualizada</strong>  satisfactoriamente. 
</div>
@elseif ($message=='destroy')
<div class="alert alert-danger alert-dismissible fade in">
  <a href="{!!URL::to('/user')!!}" class="close" data-dismiss="alert" aria-label="close">&times;</a></span></button>Pelicula <strong>eliminada</strong> satisfactoriamente.
</div> 
@endif