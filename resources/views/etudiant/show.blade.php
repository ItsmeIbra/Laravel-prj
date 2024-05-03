@extends('layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Student Informatin</div>
  <div class="card-body">
   
 
        <div class="card-body">
          <img src="{{ asset('images/' . $students->image) }}" style="width:80px; height:80px;" alt='img'>
        <h5 class="card-title">Name : {{ $students->name }}</h5>
        <p class="card-text">Level : {{ $students->level }}</p>
        <p class="card-text">Email : {{ $students->email }}</p>
        <p class="card-text">Mobile : {{ $students->mobile }}</p>
  </div>
       
    </hr>
  
  </div>
</div>
@endsection