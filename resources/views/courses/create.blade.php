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
<form method="POST" action="{{route('courses.store')}}">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">name</label>
    <input type="text" class="form-control" name="name">
  </div>
 




  <button type="submit" class="btn btn-primary">Submit</button>
  
  </form>
</div> 
@endsection