@if(Session::has('message-error'))
<div class="alert alert-danger alert-dismissible">
  <a href="{!!URL::to('/')!!}" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{Session::get('message-error')}}
</div>
@elseif(Session::has('message-error-genders'))
<div class="alert alert-danger alert-dismissible">
  <a href="{!!URL::to('/gender/create')!!}" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{Session::get('message-error-genders')}}
</div>
@endif