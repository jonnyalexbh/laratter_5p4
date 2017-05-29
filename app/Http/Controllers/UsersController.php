<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\PrivateMessage;
use App\User;
use App\Notifications\UserFollowed;
use Illuminate\Http\Request;

class UsersController extends Controller
{
  /**
  * show
  *
  */
  public function show($username)
  {
    $user = $this->findByUsername($username);

    return view('users.show', [
      'user' => $user,
    ]);
  }
  /**
  * follow
  *
  */
  public function follow($username, Request $request)
  {
    $user = $this->findByUsername($username);

    $me = $request->user();

    $me->follows()->attach($user);

    $user->notify(new UserFollowed($me));

    return redirect("/$username")->withSuccess('Usuario seguido!');
  }
  /**
  * unfollow
  *
  */
  public function unfollow($username, Request $request)
  {
    $user = $this->findByUsername($username);

    $me = $request->user();

    $me->follows()->detach($user);

    return redirect("/$username")->withSuccess('Usuario no seguido!');
  }
  /**
  * follows
  *
  */
  public function follows($username)
  {
    $user = $this->findByUsername($username);

    return view('users.follows', [
      'user' => $user,
      'follows' => $user->follows,
    ]);
  }
  /**
  * followers
  *
  */
  public function followers($username)
  {
    $user = $this->findByUsername($username);

    return view('users.follows', [
      'user' => $user,
      'follows' => $user->followers,
    ]);
  }
  /**
  * sendPrivateMessage
  *
  */
  public function sendPrivateMessage($username, Request $request)
  {
    $user = $this->findByUsername($username);

    $me = $request->user();
    $message = $request->input('message');

    $conversation = Conversation::between($me, $user);

    $privateMessage = PrivateMessage::create([
      'conversation_id' => $conversation->id,
      'user_id' => $me->id,
      'message' => $message,
    ]);

    return redirect('/conversations/'.$conversation->id);
  }
  /**
  * showConversation
  *
  */
  public function showConversation(Conversation $conversation)
  {
    $conversation->load('users', 'privateMessages');

    return view('users.conversation', [
      'conversation' => $conversation,
      'user' => auth()->user(),
    ]);
  }
  /**
  * findByUsername
  *
  */
  private function findByUsername($username)
  {
    return User::where('username', $username)->firstOrFail();
  }
  /**
  * notifications
  *
  */
  public function notifications(Request $request)
  {
    return $request->user()->notifications;
  }
}
