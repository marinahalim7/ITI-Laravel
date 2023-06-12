@extends('layout.app')
@section('main-content')
    <form method="post" action="/articles/{{$article["id"]}}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label" >Title </label>
            <input type="text" class="form-control" id="title" name="title" value="{{$article['title']}}">
            <div class="text-danger">{{ $errors->first('title') }}</div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{$article['description']}}">
            <div class="text-danger">{{ $errors->first('description') }}</div>
        </div>

        <div class="mb-3">
            <label for="rate" class="form-label">Rate</label>
            <input type="text" class="form-control" id="rate" name="rate" value="{{ old('rate', $article['rate']) }}">
            <div class="text-danger">{{ $errors->first('rate') }}</div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
