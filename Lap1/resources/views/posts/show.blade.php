@extends('layout.app')
@section('main-content')
<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h3>{{$post["title"]}}</h3>
      <p class="card-text">{{$post["description"]}}</p>
      <a class="btn btn-primary" href="/posts">All Posts</a>

    </div>
  </div>

    
@endsection