@extends('layouts.user') 
@section('content')
<h1>
    Book a movie</h1>
    @include('includes.form_error')
@if($shows) 
<h4>
    Select show
</h4>
<form method="post" action="{{ route('user.post.booking.step1') }}">
    {{ csrf_field() }} @foreach($shows as $show)
    <div class="container" style="margin-bottom: 20px;">
        <div class="row">
            <div class="col-sm-4">
            <label for="slot_id_{{$show->id}}">{{date('d-m-Y h:i a', strtotime($show->slot))}}</label>
                <input {{$show_id == $show->id ? "checked='checked'" : '' }} value="{{$show->id}}" type="radio" name="slot_id" id="slot_id_{{$show->id}}">
            </div>
            <div class="col-sm-4">
                {{$show->film->name}}
            </div>
            <div class="col-sm-4">
                @if($show->film->image) <img class="img-resposive" style="max-width: 100px;" src="{{asset('films/'.$show->film->image)}}" alt=""> @endif
            </div>
        </div>
    </div>
    @endforeach
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Continue</button>
    </div>
</form>
@else   
    <h4>No Shows</h4>
@endif
@endsection