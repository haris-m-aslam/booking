@extends('layouts.admin') 
@section('content')
<h1>Add Show Time</h1>
	@include('includes.form_error')
<form method="post" action="{{ route('show-times.store') }}">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="slot">Time</label>
		<input id="slot" type="text" class="form-control" name="slot" value="{{ old('slot') }}">
	</div>
	<div class="form-group">
		<label for="description">Select movie</label>
		<select name="film_id" id="film_id">
			@foreach($movies as $movie)
				<option value="{{$movie->id}}">{{$movie->name}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Add</button>
	</div>
</form>
@endsection