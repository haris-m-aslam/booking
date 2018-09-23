@extends('layouts.admin') 
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="pull-left">Show Bookings of {{date('d-m-Y h:i a', strtotime($timing))}}</h1>
    </div>
    <div class="col-sm-12">
        <p>
            Total Bookings {{count($bookings)}}
        </p>
        <p>
            Available Seats {{$totalSeats - count($bookings)}}
        </p>
    </div>
</div>

@if(count($bookings))
<table class="table">
    <thead>
        <tr>
            <th>Seat</th>
            <th>
                User
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
        <tr>
            {{-- <td>{{date('d-m-Y h:i a', strtotime($booking->show->slot))}}</td> --}}
            <td>{{$booking->seat->name}}</td>
            <td>{{$booking->user->name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
    <p>No bookings</p>
@endif
@endsection