@extends('Layout.app')
@section('title')
All Users
@endsection
@section('main-content')
<div class ="text-center ">

<table class="table my-4 text-center">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">email</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
    <tr>
      <td>{{ $user->id }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
    </tr>
     @endforeach 
  </tbody>
  </table>
  <div class="d-flex">
    {{ $users->links() }}
  </div>
</div>
@endsection