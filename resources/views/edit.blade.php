@extends('layouts.app')
@section('title', 'Edit Task')
@section('styles')
    <style>
        .error-message{
            color:red;
            font-size: 0, 8rem;
        }
    </style>
@endsection
@section('content')
    {{-- {{$errors}} --}}
    <form method="POST" action="{{ route('tasks.update', ['id' => $task->id]) }}">
        @csrf <!--directive to protect crosssite rquest forging by generating a unique token-->
        @method('PUT')
        <div>
            <label for='title'>
                Title
            </label>
            <input type="text" name="title" id="title"  value="{{$task->title}}"/>
            @error('title')
                <p class="error-message">{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for='description'>
                Description
            </label>
            <textarea type="text" name="description" id="description"  rows="5">{{$task->description}}</textarea>
        </div>

        <div>
            <label for='long_description'>
                Long Description
            </label>
            <textarea type="text" name="long_description" id="long_description"  rows="10">{{$task->long_description}}</textarea>
        </div>
        <br>
        <div>
            <button type="submit">Edit Task</button>
        </div>
    </form>
@endsection
