@extends('Layout.app')
@section('title')
All Posts
@endsection
@section('main-content')
<div class ="text-center ">
<a type="button" href="{{route('createpost')}}" class="btn btn-success">Create Post</a>

<table class="table my-4 text-center">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
        <th scope="col">Image</th>
   
      <th scope="col">Created at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
     
    <tr>
      <td>{{ $post->id }}</td>
      <td>{{ $post->title }}</td>
      <td>{{ $post->description }}</td>
      <td> <img src="images/posts/{{ $post->image }}" width=100> </td>
      <td>{{ $post->created_at }}</td>
      <td> 
        <a href="{{route('post',$post->id)}}" type="button" class="btn btn-success">Show</a>
        <a href="{{route('updatePost',$post->id)}}"type="button" class="btn btn-danger">edit</a>
        <a href="{{route('deletepost',$post->id)}}" type="button" class="btn btn-warning">delete</button>
      </td>
    </tr>
     @endforeach 
  </tbody>
</table>
</div>
@endsection