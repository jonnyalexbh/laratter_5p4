<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  $links = [
    'https://laravel.com/' => 'Home laravel',
    'https://laravel.com/docs/5.4' => 'Documentation laravel'
  ];
  return view('welcome', ['links' => $links, 'teacher' => 'jonnyalexbh']);
});

Route::get('/about', function (){
  return view('about');
});
