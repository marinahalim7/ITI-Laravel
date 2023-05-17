@extends('layouts.app')
@section('title')
New Post
@endsection
@section('main-content')
<div class="card" style="width: 22rem;">
  <img class="card-img-top" src="{{ asset('images/posts/'.$post->image)}}" alt="Card image cap">
  <div class="card-body">
   <h5 class="card-title">Title: {{ $post->title }}</h5>
    <p class="card-text">Description: {{ $post->description }}</p>
    <p class="card-text">created_at: {{  Carbon\Carbon::parse($post->created_at)->format('d-m-Y i')}}</p>
    <p class="card-text">updated_at: {{ $post->updated_at }}</p>
    <p class="card-text">Created By: {{ $post->user->name}}</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

@endsection