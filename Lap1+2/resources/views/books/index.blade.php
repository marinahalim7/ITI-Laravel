@extends('Layout.app')
@section('title')
All Books
@endsection
@section('main-content')
<div class ="text-center ">
<a type="button " href="{{route('books.create')}}" class="btn btn-success">New Book</a>

<table class="table my-4 text-center">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
       
        <th scope="col">Number Of Pages</th>
      
      <th scope="col">Created at</th>
      <th scope="col">Image</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($books as $book)
     
    <tr>
      <td>{{ $book->id }}</td>
      <td>{{ $book->title }}</td>
      <td>{{ $book->description }}</td>
      <td>{{ $book->num_of_pages }}</td>
      <td>{{ $book->created_at }}</td>
      <td> <img src="images/books/{{ $book->image }}" width=100></td>
      <td> 
        <a href="{{route('books.show',$book->id)}}" type="button" class="btn btn-success">Show</a>
        <a href="{{route('books.edit',$book->id)}}"type="button" class="btn btn-warning">edit</a>
        
        <form method="post" action="{{route('books.destroy',$book->id)}}" class="d-inline" >
          @method('delete')
          @csrf
          <input type="submit" class="btn btn-danger " value="Delete">
        </form>

      </td>
    </tr>
     @endforeach 
  </tbody>
</table>
</div>
@endsection