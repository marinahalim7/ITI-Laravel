@extends('layouts.app')
@section('title')
All posts
@endsection
@section('main-content')
<div class ="text-center ">
  @auth
  <h2 class="text-center py-4 fw-bold">Welcome {{Auth::user()->name}}</h2>
  @endauth
<a type="button " href="{{route('posts.create')}}" class="btn btn-success">New post</a>

<table class="table my-4 text-center">
  <thead>
    <tr>
     
      <th scope="col">id</th>
      <th scope="col">Title</th>
       <th scope="col">Slug</th>
      <th scope="col">Description</th>
        <th scope="col">user_id</th>
      <th scope="col">Created at</th>
      <th scope="col">Image</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
    <tr>
      <td>{{ $post->id }}</td>
      <td>{{ $post->title }}</td>
        <td>{{ $post->slug }}</td>
      <td>{{ $post->description }}</td>
       <td>{{ $post->user_id }}</td>
      <td>{{ $post->created_at }}</td>
     
      <td> <img src="images/posts/{{ $post->image }}" heigth=20 width=100></td>
      <td> 
        <a href="{{route('posts.show',$post->slug)}}" type="button" class="btn btn-success btn-sm">Show</a>
    
        <a href="{{route('posts.edit',$post->id)}}"type="button" class="btn btn-warning btn-sm">edit</a>
      
        <form method="post" action="{{route('posts.destroy',$post->id)}}" class="d-inline"  onclick="return confirm('Are you sure?')">

          @method('delete')
          @csrf
          <input type="submit" class="btn btn-danger  btn-sm" value="Delete">
        </form>
      </td>
    </tr>
     @endforeach 
  </tbody>
</table>
 <div class="d-flex">
                {!! $posts->links() !!}
            </div>
</div>
@endsection