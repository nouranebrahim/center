@extends('layouts.app')
@section('content')
<div class="container">
@if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
<form method="POST" action="{{route('users.store')}}">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">name</label>
    <input type="text" class="form-control" name="name">
    <label for="exampleFormControlInput1">email</label>
    <input type="text" class="form-control" name="email">
    <label for="exampleFormControlInput1">password</label>
    <input type="text" class="form-control" name="password">
  </div>
 




  <div class="form-group">
    <label for="exampleFormControlSelect1">courses</label>
    <select name="user_id" class="form-control ">
        @foreach($courses as $course)  
          <option value="{{$course->id}}">{{$course->name}}</option>
        @endforeach
        </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  
  </form>
  </div> 
@endsection