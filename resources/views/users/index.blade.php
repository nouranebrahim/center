@extends('layouts.app')
@section('content')
<div class="container">
    <h1> my users</h1>
    <table class="table">
  <thead>
  <a href="{{route('users.create')}}" class="btn btn-primary">create user</a>
    <tr>
      <th scope="col">id</th>
      <th scope="col">created_at</th>
      <th scope="col">updated_at</th>
      <th scope="col">name</th>
    
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
      
      
      <td>{{$user->id}}</td>
      <td>{{$user->created_at}}</td>
      <td>{{$user->updated_at}}</td>
      <td>{{$user->name}}</td>
      
      <td><a href="{{route('users.show',['user'=> $user->id])}}" class="btn btn-primary">view</a></td>
    <td> <a href="{{route('users.edit',['user'=> $user->id])}}"
         class="btn btn-primary  float-left mb-2 mr-2">Edit</a> </td>
     
         <td>    <form method="POST" action="{{route('courses.destroy',['course' => $course->id])}}"
          class="float-right">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger mr-2"
          onclick="return confirm ('are you sure?')">Delete</button>
          </form> 
     </td> 
         
             
   @endforeach
    </tr>
 
   


    
  </tbody>
  </div> 
  @endsection