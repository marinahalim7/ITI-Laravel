@extends('layout.app')
@section('main-content')
    <div class="d-flex justify-content-center my-4">
        <a class="btn btn-success" href="/create">New Post</a>
    </div>

    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $loop->index }}</th>
                    <td>{{ $post['title'] }}</td>
                    <td>{{ $post['description'] }}</td>
                    <td>
                        <a class="btn btn-primary" href="/posts/{{ $post->id }}">Show</a>
                        <a class="btn btn-success" href="/edit/{{ $post->id }}">Edit</a>
                        <form method="post" action="/delete/{{ $post->id }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach






        </tbody>
    </table>
    <div class="d-flex">
        {!! $posts->links() !!}
    </div>
   
@endsection
