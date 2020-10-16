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

         <td><a class="btn btn-danger" href="#" role="button" data-toggle="modal" data-target="#delete-modal-{{$course->id}}">Delete</a></td>
      <div class="modal fade" id="delete-modal-{{$course->id}}" tobindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form method="POST"  action="{{route('courses.destroy',$course->id)}}">
                      @csrf
                      @method('DELETE')
                      <div class="modal-header">
                        <h5 class="modal-title">Delete course #{{$course->id}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Click delete to delete the course!
                        
                      </div>
                      <div class="modal-body">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>

                      </div>

                    </form>
                    </div>
                  </div>
              </div>
             
   @endforeach
    </tr>
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
      @if($course)
      <a href="{{route('courses.destroy',['course'=> $course->id])}}" class="btn btn-warning">yes</a>
      <a href="{{route('courses.index')}}" class="btn btn-warning">no</a>
      @endif 
      </div>
    </div>
   
  </div>
</div>

  </tbody>
</table>
</div>
@endsection