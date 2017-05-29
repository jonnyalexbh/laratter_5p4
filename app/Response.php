<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{

  protected $guarded = [];

  /**
  * user
  *
  */
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  /**
  * message
  *
  */
  public function message()
  {
    $this->belongsTo(Message::class);
  }
}
