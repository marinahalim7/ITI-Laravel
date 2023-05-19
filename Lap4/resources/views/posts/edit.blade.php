
@extends('layouts.app')
@section('title')
Update Post
@endsection
@section('main-content')
<div class="row">
    <div class="mx-auto col-10 col-md-8 col-lg-8">
    

<form method="post" action="{{route('posts.update',$post->id)}}" enctype='multipart/form-data' >
  @method('put')
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title : </label>
    <input type="text" class="form-control" id="exampleInputEmail1" name='title' value="{{ $post->title }}">
    @error('title')
      <div class="alert alert-danger d-flex align-items-center my-2" role="alert">
           <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
           <div >{{ $message }}</div>
      </div>
    @enderror
  </div>

  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Description : </label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" >{{ $post->description  }}</textarea>
  @error('description')
    <div class="alert alert-danger d-flex align-items-center my-2" role="alert">
       <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
       <div>{{ $message }}</div>
    </div>
  @enderror
 </div>
 
  @if($post->image)
  <div class="mb-3">
  <label for="oldImage" class="form-label">Old Image  : </label>
   <img src="{{ asset('images/posts/'.$post->image )}}" width=100>
 </div>

  @endif


  <div class="mb-3">
  <label for="newIMg" class="form-label">Image  : </label>
   <input type="file" class="form-control" id="newIMg" rows="3" name="image"></input>
 </div>




  <button type="submit" class="btn btn-success">Submit</button>
</form>
</div>
</div>


@endsection