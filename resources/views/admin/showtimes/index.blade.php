@extends('layouts.admin') 
@section('content')
<h1 class="pull-left">Show Times</h1>
<a class="pull-right" href="{{route('show-times.create')}}">Add Show Time</a>
<table class="table">
    <thead>
        <tr>
            <th>Time</th>
            <th>
                Movie
            </th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @if($showtimes) @foreach($showtimes as $show)
        <tr>
            <td>{{date('d-m-Y h:i a', strtotime($show->slot))}}</td>
            <td>{{$show->film->name}}</td>
            <td>
                <a href="{{route('show-times.edit', $show->id)}}">Edit</a>
            </td>
        </tr>
        @endforeach @endif
    </tbody>
</table>
@endsection