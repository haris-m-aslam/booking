@extends('layouts.user') 
@section('content')
<h1>
    Book a movie</h1>
<h4>
    Select seat <span class="pull-right">Available seats: {{ count($seats) - count($bookings)}}</span>
</h4>
    @include('includes.form_error')
<form method="post" action="{{ route('user.post.booking.step2') }}">
    {{ csrf_field() }} @if($seats) @foreach($seats as $seat)
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <label for="seat_id_{{$seat->id}}">{{$seat->name}}</label>
                @if(!in_array($seat->id, $bookings))
                    <input value="{{$seat->id}}" type="checkbox" name="seat_id[]" id="seat_id_{{$seat->id}}">
                    @else
                    <span class="alert-warning">
                        Occupied
                    </span>
                   @endif



            </div>
        </div>
    </div>
    @endforeach @endif
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Continue</button>
    </div>
</form>
@endsection