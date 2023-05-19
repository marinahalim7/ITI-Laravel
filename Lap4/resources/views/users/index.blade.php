@extends('layouts.app')
@section('title')
All users
@endsection
@section('main-content')
<div class ="text-center ">
<a type="button " href="{{route('users.create')}}" class="btn btn-success">New user</a>

<table class="table my-4 text-center">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">created_at</th>
       <th scope="col">updated_at</th>
        <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
    <tr>
      <td>{{ $user->id }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->created_at }}</td>
      <td>{{ $user-> updated_at }}</td>
     
 
     
     
      <td> 
        <a href="{{route('users.show',$user->id)}}" type="button" class="btn btn-success">Show</a>
        
       
      </td>
    </tr>
     @endforeach 
  </tbody>
</table>
  <div class="d-flex">
                {!! $users->links() !!}
            </div>
</div>
@endsection