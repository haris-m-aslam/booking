@extends('layouts.user') 
@section('content')
<h1>
    Book a movie</h1>
<h4>
    Select show
</h4>
    @include('includes.form_error')
<form method="post" action="{{ route('user.post.booking.step1') }}">
    {{ csrf_field() }} @if($shows) @foreach($shows as $show)
    <div class="container">
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
    @endforeach @endif
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Continue</button>
    </div>
</form>
@endsection