<?php

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use Laravel\Prompts\Concerns\Fallback;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Task;

Route::get('/', function () {
    return redirect()->route('create.task');
});

Route::get('/tasks', function () {
    return view('index', ['tasks' => \App\Models\Task::latest()->get()]);
})->name('task.index');

Route::get('/tasks/{id}', function ($id)  {
    return view('show',['show' => \App\Models\Task::findOrFail($id)]);
})->name("task.show");

Route::get('/tasks/{id}/edit', function ($id)  {
    return view('edit',['task' => \App\Models\Task::findOrFail($id)]);
})->name("task.edit");

Route::fallback(function () {
    return "still got somewhere";
})->name('fallback');

Route::get('/create', function(){
    return view('create');
})->name('create.task');

Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'nullable',
    ]); // when you call this method, it will validate the request data against the rules provided.
    // if it fails, it will automatically redirect back to the previous page with the validation errors.

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'] ?? null; // Optional field
    $task->completed = false;
    $task->save();
    return redirect()->route('task.show', ['id'=> $task->id])->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::put('/tasks/{id}', function ($id, Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'nullable',
    ]); // when you call this method, it will validate the request data against the rules provided.
    // if it fails, it will automatically redirect back to the previous page with the validation errors.

    $task = Task::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'] ?? null; // Optional field
    $task->completed = false;
    $task->save();
    return redirect()->route('task.show', ['id'=> $task->id])->with('success', 'Task updated successfully!');
})->name('tasks.update');

