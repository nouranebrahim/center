@extends('layouts.app')
@section('content')
<div class="container">
    <h1> my courses</h1>
    <table class="table">
  <thead>
  <a href="{{route('courses.create')}}" class="btn btn-primary">create course</a>
    <tr>
      <th scope="col">id</th>
      <th scope="col">created_at</th>
      <th scope="col">updated_at</th>
      <th scope="col">title</th>
    
    </tr>
  </thead>
  <tbody>
  @foreach($courses as $course)
    <tr>
      
      
      <td>{{$course->id}}</td>
      <td>{{$course->created_at}}</td>
      <td>{{$course->updated_at}}</td>
      <td>{{$course->name}}</td>
      
      <td><a href="{{route('courses.show',['course'=> $course->id,'user'=> $course->user ? $course->user->id : 'not exist'])}}" class="btn btn-primary">view</a></td>
    <td> <a href="{{route('courses.edit',['course'=> $course->id])}}"
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
</table>
</div>
@endsection