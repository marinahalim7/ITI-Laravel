@extends('layout.app')
@section('main-content')
    <form method="post" action="/update/{{$post["id"]}}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label" >Title </label>
            <input type="text" class="form-control" id="title" name="title" value="{{$post['title']}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{$post['description']}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
