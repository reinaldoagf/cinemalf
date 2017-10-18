@if(Session::has('message-error'))
<div class="alert alert-danger alert-dismissible">
  <a href="{!!URL::to('/')!!}" class="close" data-dismiss="alert" aria-label="close">&times;
  {{Session::get('message-error')}}
</div>
@endif