@extends('layouts.user') 
@section('content')
<h1 class="pull-left">My Bookings</h1>
<table class="table">
    <thead>
        <tr>
            <th>Time</th>
            <th>
                Seat
            </th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @if($bookings) @foreach($bookings as $booking)
        <tr>
        <td>{{$booking->slot_id}}</td>
        <td>{{$booking->seat_id}}</td>
        <td>{{$booking->user_id}}</td>
            {{-- <td>{{date('d-m-Y h:i a', strtotime($booking->slot_id))}}</td> --}}
            {{-- <td>{{$show->film->name}}</td> --}}
        </tr>
        @endforeach @endif
    </tbody>
</table>
@endsection