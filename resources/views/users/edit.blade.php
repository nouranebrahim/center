@extends('layouts.app')
@section('content')
<div class="container">
<div class="content-wrapper">
  <div class="container">
  <div class="p-3" style="text-align:center">
  <h1 style="color:#3cb371"><strong>Edit user</strong></h1>

      <form method="POST" action="{{route('users.update',['user'=>$user->id])}}">
        @csrf
        <div class="form-group">
   
      </div>
     
          <div class="form-group"> 
              <label for="exampleFormControlTextarea1">the user</label>
              <input type="hidden" class="form-control" name="id" value="{{$user->id}}">

              <textarea class="form-control" name="name" rows="3" >{{$user->name}}</textarea>
              <textarea class="form-control" name="email" rows="3" >{{$user->email}}</textarea>
              <textarea class="form-control" name="password" rows="3" >{{$user->password}}</textarea>

          </div>
          

        <button type="submit" class="btn btn-success">Submit</button>
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
      </form>  
</div>  </div>
</div>
</div> 
@endsection