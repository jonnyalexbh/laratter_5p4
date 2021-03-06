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

    $messages = Message::latest()->paginate(10);

    return view('welcome', [
      'messages' => $messages,
    ]);
  }
  /**
  * locale
  *
  */
  public function locale(Request $request){
    session()->put('locale', $request->input('lang'));
    return back();
  }

}
