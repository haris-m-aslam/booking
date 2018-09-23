@extends('layouts.admin') 
@section('content')
<h1 class="pull-left">Seats</h1>
<a class="pull-right" href="{{route('seats.create')}}">Add Seat</a>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>
                <th>
        </tr>
    </thead>
    <tbody>
        @if($seats) @foreach($seats as $seat)
        <tr>
            <td>{{$seat->name}}</td>
            <td>
                <a href="{{route('seats.edit', $seat->id)}}">Edit</a>
            </td>
        </tr>
        @endforeach @endif
    </tbody>
</table>
@endsection