@extends('layouts.admin') 
@section('content')
<h1 class="pull-left">Show Times</h1>
<a class="pull-right" href="{{route('bookings.create')}}">Add Booking</a>
<table class="table">
    <thead>
        <tr>
            <th>Shows</th>
            <th>Movie</th>
            <th>
                Total Booking
            </th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @if($bookings) @foreach($bookings as $booking)
        <tr>
            {{-- <td>{{date('d-m-Y h:i a', strtotime($booking->slot)}}</td> --}}
            {{-- <td>{{$show->film->name}}</td> --}}
            <td></td>
            <td></td>
            <td>20</td>
            <td>
                {{-- <a href="{{route('show-times.edit', $show->id)}}">View Bookings</a> --}}
            </td>
        </tr>
        @endforeach @endif
    </tbody>
</table>
@endsection