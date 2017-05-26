<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Http\Requests\CreateMessageRequest;

class MessagesController extends Controller
{
  /**
  * show
  *
  */
  public function show(Message $message){

    // $message = Message::find($id);
    return view('messages.show', ['message' => $message,]);

  }
  /**
  * create
  *
  */
  public function create(CreateMessageRequest $request){

    // $this->validate($request, [
    //   'message' => ['required', 'max:160']
    // ],[
    //   'message.required' =>  'Please enter your message',
    //   'message.max' => 'The message can not exceed 160 characters'
    // ]);

    $user = $request->user();
    $image = $request->file('image');

    $message = Message::create([
      'user_id' => $user->id,
      'content' => $request->input('message'),
      'image' => $image->store('messages', 'public')
    ]);

    return redirect('/messages'.'/'.$message->id);

  }

}
