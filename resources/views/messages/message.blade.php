<img class="img-thumbnail" src="{{$message->image}}" alt="">
<p class="card-text">
  <div class="text-muted">written by <a href="/{{ $message->user->username }}">{{$message->user->name}}</a></div>
  {{$message->content}}
  <a href="/messages/{{$message->id}}">see more</a>
</p>
<div class="card-text text-muted float-right">{{$message->created_at}}</div>
