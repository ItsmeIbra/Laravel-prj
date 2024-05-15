@extends('layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Information étudiant</div>
  <div class="card-body">
   
 
        <div class="card-body">
          <img src="{{ asset('images/' . $etudiant->image) }}" style="width:80px; height:80px;" alt='img'>
        <h5 class="card-title">Nome : {{ $etudiant->name }}</h5>
        <p class="card-text">Niveau : {{ $etudiant->level }}</p>
        <p class="card-text">Email : {{ $etudiant->email }}</p>
        <p class="card-text">Telephone : {{ $etudiant->mobile }}</p>
  </div>
       
    </hr>
  
  </div>
</div>
@endsection