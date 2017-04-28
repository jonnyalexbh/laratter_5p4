<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
  /**
  * home
  *
  */
  public function home(){
    $links = [
      'https://laravel.com/' => 'Home laravel',
      'https://laravel.com/docs/5.4' => 'Documentation laravel'
    ];
    return view('welcome', ['links' => $links, 'teacher' => 'jonnyalexbh']);
  }
  /**
  * aboutUs
  *
  */
  public function aboutUs(){
    return view('about');
  }
}
