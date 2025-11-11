<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function (){
    return view('index',[
        'tasks' => Task::latest()->get(),
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) {

    return view('show', [
        'task' => Task::findOrFail($id)

    ]);
})->name("tasks.show");

//Route::get('/about', function () {
//    return 'main hello';
//})->name('about');
//
//Route::get('/abot', function () {
//    return redirect()->route('about');
//});
//
//
//Route::get('/greet/{name}', function ($name) {
//    return "hello {$name}";
//});
//
//Route::fallback(function () {
//    return "still got somewhere";
//});
