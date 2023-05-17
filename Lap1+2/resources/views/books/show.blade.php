@extends('Layout.app')
@section('title')
New Book
@endsection
@section('main-content')
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{ asset('images/books/'.$book->image)}}" alt="Card image cap">
  <div class="card-body">
   <h5 class="card-title">Title: {{ $book->title }}</h5>
    <p class="card-text">Description: {{ $book->description }}</p>
    <p class="card-text">created_at: {{ $book->created_at }}</p>
    <p class="card-text">updated_at: {{ $book->updated_at }}</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

@endsection