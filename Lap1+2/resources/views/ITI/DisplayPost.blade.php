@extends('Layout.app')
@section('title')
New Post
@endsection
@section('main-content')
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{ asset('images/posts/'.$post->image)}}" alt="Card image cap">
  <div class="card-body">
   <h5 class="card-title">{{ $post->title }}</h5>
    <p class="card-text">{{ $post->description }}</p>
    <p class="card-text">{{ $post->created_at }}</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

@endsection