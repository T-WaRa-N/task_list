@extends('layouts.app')
@section('title', $show->title) {{-- This sets the title of the page to the task's title --}}
@section('content')
    <p>{{$show -> description}}</p>
    @if ($show -> long_description)
        <p>{{$show -> long_description}}</p>
    @endif
    <p>Created at: {{$show -> created_at}}</p>
    <p>Updated at: {{$show -> updated_at}}</p>
@endsection
