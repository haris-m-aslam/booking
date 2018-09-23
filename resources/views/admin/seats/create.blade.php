@extends('layouts.admin') 
@section('content')
<h1>Add Seat</h1>
	@include('includes.form_error')
<form method="post" action="{{ route('seats.store') }}">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="name">Seat Name</label>
		<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Add</button>
	</div>
</form>
@endsection