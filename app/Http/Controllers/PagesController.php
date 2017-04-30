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
    $messages = [
      [
        'id' => 1,
        'content' => 'This is my first message',
        'image' => 'http://lorempixel.com/600/338?1'
      ],
      [
        'id' => 2,
        'content' => 'This is my second message',
        'image' => 'http://lorempixel.com/600/338?2'
      ],
      [
        'id' => 3,
        'content' => 'This is my Third message',
        'image' => 'http://lorempixel.com/600/338?3'
      ],
      [
        'id' => 4,
        'content' => 'This is my fourth message',
        'image' => 'http://lorempixel.com/600/338?4'
      ]
    ];
    return view('welcome', [
      'messages' => $messages,
    ]);
  }

}
