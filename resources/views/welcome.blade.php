<!--
* Jonnyalexbh
* @Description: view welcome 
-->
@extends('layouts.app')

@section('content')

  <div class="title m-b-md">
    laratter_5p4
  </div>
  @if(isset($teacher))
    <p>Teacher: {{ $teacher }}</p>
  @else
    <p>Teacher to define</p>
  @endif
  <div class="links">
    @foreach ($links as $link => $text)
      <a href="{{ $link }}">{{ $text }}</a>
    @endforeach
  </div>

@endsection
