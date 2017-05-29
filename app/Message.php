<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Message extends Model
{

  use Searchable;

  protected $guarded = [];
  /**
  * user
  *
  */
  public function user(){
    return $this->belongsTo(User::class);
  }
  /**
  * getImageAttribute
  *
  */
  public function getImageAttribute($image)
  {
    if (!$image || starts_with($image, 'http')) {
      return $image;
    }

    return \Storage::disk('public')->url($image);
  }
  /**
  * toSearchableArray
  *
  */
  public function toSearchableArray()
  {
    $this->load('user');

    return $this->toArray();
  }

}
