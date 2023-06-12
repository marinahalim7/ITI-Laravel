@extends('layout.app')
@section('main-content')
    <table class="table">
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
                <th scope="row">{{$loop->index}}</th>
                <td>{{$post["title"]}}</td>
                <td>{{$post["description"]}}</td>
                <td>
                    <a class="btn btn-primary" href="/posts/{{$loop->index}}">Show</a>
                    <a class="btn btn-success">Edit</a>
                    <a class="btn btn-danger">Delete</a>

                </td>
            </tr>
            @endforeach
        @endsection
       

    </tbody>
</table>
