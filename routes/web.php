<?php

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use Laravel\Prompts\Concerns\Fallback;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

Route::get('/', function () {
    return redirect()->route('create.task');
});

Route::get('/tasks', function () {
    return view('index', ['tasks' => \App\Models\Task::latest()->get()]);
})->name('task.index');

Route::get('/tasks/{id}', function ($id)  {
    return view('show',['show' => \App\Models\Task::findOrFail($id)]);
})->name("task.show");

Route::fallback(function () {
    return "still got somewhere";
})->name('fallback');

Route::get('/create', function(){
    return view('create');
})->name('create.task');

Route::post('/tasks', function (Request $request) {
    dd($request->all());
})->name('tasks.store');

