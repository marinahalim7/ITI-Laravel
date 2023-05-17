
@extends('Layout.app')
@section('title')
Update Post
@endsection
@section('main-content')
<div class="row">
    <div class="mx-auto col-10 col-md-8 col-lg-8">
    

<form method="post" action="{{route('books.update',$book->id)}}" enctype='multipart/form-data' >
  @method('put')
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title : </label>
    <input type="text" class="form-control" id="exampleInputEmail1" name='title' value="{{ $book->title }}">
    @error('title')
      <div class="alert alert-danger d-flex align-items-center my-2" role="alert">
           <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
           <div >{{ $message }}</div>
      </div>
    @enderror
  </div>

  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Description : </label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" >{{ $book->description  }}</textarea>
  @error('description')
    <div class="alert alert-danger d-flex align-items-center my-2" role="alert">
       <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
       <div>{{ $message }}</div>
    </div>
  @enderror
 </div>
  <div class="mb-3">
    <label for="num_of_pages" class="form-label">Number Of Pages : </label>
    <input type="number" class="form-control" id="num_of_pages" name='num_of_pages' value="{{ $book->num_of_pages }}">
    @error('num_of_pages')
      <div class="alert alert-danger d-flex align-items-center my-2" role="alert">
           <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
           <div >{{ $message }}</div>
      </div>
    @enderror
  </div>
  @if($book->image)
  <div class="mb-3">
  <label for="oldImage" class="form-label">Old Image  : </label>
   <img src="{{ asset('images/books/'.$book->image )}}" width=100>
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