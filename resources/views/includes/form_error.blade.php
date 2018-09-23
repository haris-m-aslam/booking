@if(count($errors)>0)

<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif 

@if(Session::has('flash_error_msg'))
<div class="alert alert-danger">{{ session('flash_error_msg') }}</div>
@endif