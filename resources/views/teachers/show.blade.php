@extends('layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Teachers information</div>
  <div class="card-body">
   
 
        <div class="card-body">
          <img src="{{ asset('imgs/' . $teachers->img) }}" style="width:80px; height:80px;" alt='img'>
        <h5 class="card-title">Name : {{ $teachers->name }}</h5>
        <p class="card-text">Material : {{ $teachers->material }}</p>
        <p class="card-text">Email : {{ $teachers->email }}</p>
        <p class="card-text">Mobile : {{ $teachers->mobile }}</p>
  </div>
      
    </hr>
  
  </div>
</div>
@endsection