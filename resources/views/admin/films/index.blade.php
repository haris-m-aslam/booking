@extends('layouts.admin') 
@section('content')
<h1 class="pull-left">Movies</h1>
<a class="pull-right" href="{{route('films.create')}}">Add Movie</a>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>
                <th>
        </tr>
    </thead>
    <tbody>
        @if($films) @foreach($films as $film)
        <tr>
            <td>{{$film->name}}</td>
            <td>
                <a href="{{route('films.edit', $film->id)}}">Edit</a>
            </td>
        </tr>
        @endforeach @endif
    </tbody>
</table>
@endsection