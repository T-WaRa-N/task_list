@extends('layouts.app')
@section('title', $all_tasks->title) {{-- This sets the title of the page to the task's title --}}
@section('content')
    <p>{{$all_tasks -> description}}</p>
    @if ($all_tasks -> long_description)
        <p>{{$all_tasks -> long_description}}</p>
    @endif
    <p>Created at: {{$all_tasks -> created_at}}</p>
    <p>Updated at: {{$all_tasks -> updated_at}}</p>
@endsection
