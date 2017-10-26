<?php  $message=Session::get('message') ?>
@if($message=='store')
<div class="alert alert-success alert-dismissible">
  <button><a href="{!!URL::to('/user')!!}" class="close" data-dismiss="alert" aria-label="close">&times;</a></span></button>Usuario <strong>registrado</strong>  satisfactoriamente.
</div>
@elseif ($message=='update')
<div class="alert alert-success alert-dismissible">
  <button><a href="{!!URL::to('/user')!!}" class="close" data-dismiss="alert" aria-label="close">&times;</a></span></button>Usuario <strong>actualizado</strong>  satisfactoriamente. 
</div>
@elseif ($message=='destroy')
<div class="alert alert-danger alert-dismissible fade in">
  <button><a href="{!!URL::to('/user')!!}" class="close" data-dismiss="alert" aria-label="close">&times;</a></span></button>Usuario <strong>eliminado</strong> satisfactoriamente.
</div>    
@elseif($message=='password')
<div class="alert alert-danger alert-dismissible fade in">
  <button><a href="{!!URL::to('/user')!!}" class="close" data-dismiss="alert" aria-label="close">&times;</a></span></button>Las <strong>contraseñas</strong> no coinciden.
</div>    
@endif