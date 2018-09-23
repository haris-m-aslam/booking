@extends('layouts.admin') 
@section('content')
<h1>Add Movie</h1>
	@include('includes.form_error')
<form method="post" action="{{ route('films.store') }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="name">Name</label>
		<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
	</div>
	<div class="form-group">
		<label for="description">About movie</label>
		<textarea id="description"  class="form-control" name="description" cols="30" rows="10">{{ old('description') }}</textarea>
	</div>
	<div class="form-group">
		<label for="Name">Movie image</label>
		<input id="image" type="file" class="form-control" name="image">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Add</button>
	</div>
</form>
@endsection