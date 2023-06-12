@extends('layout.app')
@section('main-content')
    <div class="d-flex justify-content-center my-4">
        <a class="btn btn-success" href="{{route('articles.create')}}">New article</a>
    </div>

    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Rate</th>
                <th scope="col">Author</th>
                <th scope="col">Author Articles</th>
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
                    <td>{{ $article->user->name}}</td>
                    <td>
                        <a class="btn btn-success" href="{{route('user.aricles',$article->user)}}">Articles</a>
                    </td>
                    <td>                         
                        <a class="btn btn-primary" href=" {{route('articles.show',$article->id)}}">Show</a>
                        <a class="btn btn-success" href="{{route('articles.edit',$article->id)}}">Edit</a>
                        <form method="post" action="{{route('articles.destroy',$article->id)}}" class="d-inline">
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
        {!! $articles->links() !!}
    </div>
   
@endsection
