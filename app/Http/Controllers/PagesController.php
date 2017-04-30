<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class PagesController extends Controller
{
  /**
  * home
  *
  */
  public function home(){

    $messages = Message::all();

    return view('welcome', [
      'messages' => $messages,
    ]);
  }

}
