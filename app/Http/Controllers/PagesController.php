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

    $messages = Message::paginate(10);

    return view('welcome', [
      'messages' => $messages,
    ]);
  }

}
