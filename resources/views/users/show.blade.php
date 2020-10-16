@extends('layouts.app')
@section('content')
<div class="container">
<div class="card" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title">{{$user->name}}</h5>
        <h5 class="card-title">{{$user->email}}</h5>

        

         
        </div>
      </div>
</div>
@endsection