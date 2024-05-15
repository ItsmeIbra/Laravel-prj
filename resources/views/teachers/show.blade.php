@extends('layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Information professeur</div>
  <div class="card-body">
   
 
        <div class="card-body">
          <img src="{{ asset('imgs/' . $teachers->img) }}" style="width:80px; height:80px;" alt='img'>
        <h5 class="card-title">Nom : {{ $teachers->name }}</h5>
        <p class="card-text">Matiere : {{ $teachers->material }}</p>
        <p class="card-text">Email : {{ $teachers->email }}</p>
        <p class="card-text">Telephone : {{ $teachers->mobile }}</p>
  </div>
      
    </hr>
  
  </div>
</div>
@endsection