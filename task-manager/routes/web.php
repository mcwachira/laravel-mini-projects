<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index',[
//        'name' => 'charles'
    ]);
});


Route::get('/about', function () {
    return 'main hello';
})->name('about');

Route::get('/abot', function () {
    return redirect()->route('about');
});


Route::get('/greet/{name}', function ($name) {
    return "hello {$name}";
});

Route::fallback(function () {
    return "still got somewhere";
});
