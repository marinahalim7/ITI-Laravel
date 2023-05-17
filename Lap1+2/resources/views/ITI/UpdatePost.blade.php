
@extends('Layout.app')
@section('title')
Update Post
@endsection
@section('main-content')
<div class="row">
    <div class="mx-auto col-10 col-md-8 col-lg-8">
<form method="post" action="/upd/{{$id}}" enctype='multipart/form-data'  >
   @method('post')
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title : </label>
    <input type="text" class="form-control" id="exampleInputEmail1" name='title'>
     @error('title')
      <div class="alert alert-danger d-flex align-items-center my-2" role="alert">
           <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
           <div >{{ $message }}</div>
      </div>
    @enderror
  </div>
  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Description : </label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{ old('description') }}</textarea>
    @error('description')
    <div class="alert alert-danger d-flex align-items-center my-2" role="alert">
       <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
       <div>{{ $message }}</div>
    </div>
  @enderror
 </div>
  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Image  : </label>
  <input type="file" class="form-control" id="exampleFormControlTextarea1" rows="3" name="image" ></input>

 </div>

 


  <button type="submit" class="btn btn-success">Update</button>
</form>
</div>
</div>

@endsection