@extends('layouts.app')
@section('title')
Details of User
@endsection
@section('main-content')
<div class="card" style="width: 18rem;">
  <div class="card-body">
   <h5 class="card-title">Name: {{ $user->name }}</h5>
    <p class="card-text">Email: {{ $user->email }}</p>
    <p class="card-text">created_at: {{ $user->created_at }}</p>
    <p class="card-text">updated_at: {{ $user->updated_at }}</p>
    @if($user->posts)
    <h6>Posts:</h6>
    <ul>
      @foreach($user->posts as $post)
         <li class="card-tex"> {{ $post->title }}</li>
      @endforeach
</ul>  
    @endif
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

@endsection