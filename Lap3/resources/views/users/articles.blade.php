@extends('layout.app')
@section('main-content')
    <div class="d-flex justify-content-center my-4">

        <h3>Your Articles </h1>
    </div>
    <div class="d-flex justify-content-center my-4">
        <a class="btn btn-success" href="/articles/create">New article</a>
    </div>

    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Rate</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <th scope="row">{{ $article['id'] }}</th>
                    <td>{{ $article['title'] }}</td>
                    <td>{{ $article['description'] }}</td>
                    <td>{{ $article['rate'] }}</td>
                    <td>
                        <a class="btn btn-primary" href="/articles/{{ $article->id }}">Show</a>
                        <a class="btn btn-success" href="/articles/{{ $article->id }}/edit">Edit</a>
                        <form method="post" action="/articles/{{ $article->id }}" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach






        </tbody>
    </table>
@endsection
