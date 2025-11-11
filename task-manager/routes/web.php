<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function (){
    return view('index',[
        'tasks' => Task::latest()->paginate(7),
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create') -> name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {

    return view('edit', [
        'task' => $task,

    ]);
})->name("tasks.edit");


Route::get('/tasks/{task}', function (Task $task) {

    return view('show', [
        'task' => $task,

    ]);
})->name("tasks.show");



Route::post('/tasks', function (TaskRequest  $request){
//    dd($request->all());

//    $data = $request->validated();
//    $task = new Task;
//    $task->title = $data['title'];
//    $task->description = $data['description'];
//    $task->long_description = $data['long_description'];
//
//    $task -> save();

    $task = Task::create($request->validated());

    return redirect()->route("tasks.show", ['task'=> $task->id])
        ->with('success', "Task Created Successfully!");

})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest  $request){
//    dd($request->all());

//
//    $data = $request->validated();
//    $task->title = $data['title'];
//    $task->description = $data['description'];
//    $task->long_description = $data['long_description'];
//
//    $task -> save();


    $task->update($request->validated());
    return redirect()->route("tasks.show", ['task'=> $task->id])
        ->with('success', "Task Updated Successfully!");

})->name('tasks.update');


Route::delete('/tasks/{task}', function (Task $task){


    $task->delete();
    return redirect()->route("tasks.index")
        ->with('success', "Task Deleted Successfully!");

})->name('tasks.destroy');


Route::put('/tasks/{task}/toggle-complete', function (Task $task) {

    $task -> toggleComplete();
    return redirect()->back()->with('success', "Task Updated Successfully!");
})->name("tasks.toggle-complete");



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
Route::fallback(function () {
    return "still got somewhere";
});
