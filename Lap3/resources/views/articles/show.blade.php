@extends('layout.app')
@section('main-content')
<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h3>{{$article["title"]}}</h3>
      <p class="card-text">{{$article["description"]}}</p>
      <p class="card-text">{{$article["rate"]}}</p>
      <a class="btn btn-primary" href="/articles">Back</a>
    </div>
  </div>

    
@endsection