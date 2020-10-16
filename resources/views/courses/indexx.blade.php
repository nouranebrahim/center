@extends('layouts.app')
@section('content')
<div class="container">
    <h1> my courses</h1>
    <table class="table">
  <thead>
  
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
      
      <td><a href="{{route('courses.enroll',['course'=> $course->id])}}" class="btn btn-primary">enroll me</a></td>
    
   @endforeach
    </tr>
    
   


   
  </tbody>
</table>

</div> 
@endsection