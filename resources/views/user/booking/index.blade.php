@extends('layouts.user') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="pull-left">My Bookings</h1>
        <a class="pull-right" href="{{route('user.booking.step1')}}">Book Ticket</a>
    </div>
</div>

@if(count($bookings))
<table class="table">
    <thead>
        <tr>
            <th>Time</th>
            <th>
                Seat
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
        <tr>
            <td>{{date('d-m-Y h:i a', strtotime($booking->show->slot))}}</td>
            <td>{{$booking->seat->name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
    <p>No bookings</p>
@endif
@endsection