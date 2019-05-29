<?php

//Route::get('/contact', function(){
//    return 'Hello from the contact form package';
//});
Route::get('/contact', function(){
    return view('tests-contact-form::contact-form');
});

Route::post('contact', function(){
    // logic goes here
})->name('contact');

Route::get('/first_test',
    '\AlexClaimer\Tests\App\Http\Controllers\FirstTestsController@create')
    ->name('first_test');

Route::get('/tests',
    '\AlexClaimer\Tests\App\Http\Controllers\FirstTestsController@create')
    ->name('tests');
