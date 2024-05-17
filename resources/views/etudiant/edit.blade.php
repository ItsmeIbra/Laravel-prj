@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Modifier la page de étudiant</div>
  <div class="card-body">
      
    <form action="{{ url('/etudiant/' .$etudiant->id) }}" method="post" enctype="multipart/form-data">

       @csrf
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$etudiant->id}}" id="id" />
        <label>Nom</label></br>
        <input type="text" name="name" id="name" value="{{$etudiant->name}}" class="form-control"></br>
        <label>Niveau</label></br>
        <input type="text" name="level" id="level" value="{{$etudiant->level}}" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" value="{{$etudiant->email}}" class="form-control"></br>
        <label>Telephone</label></br>
        <input type="text" name="mobile" id="mobile" value="{{$etudiant->mobile}}" class="form-control"></br>
        <div class="mb-3">
          <label> Télécharger la photo</label>
          <input type="file" name="image" accept="image/*">
          </div>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop