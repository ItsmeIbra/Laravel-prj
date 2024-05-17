@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Edit teachers Page</div>
  <div class="card-body">
      
    <form action="{{ url('/teachers/' .$teachers->id) }}" method="post" enctype="multipart/form-data">
      @csrf
       
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$teachers->id}}" id="id" />
        <label>NOM</label></br>
        <input type="text" name="name" id="name" value="{{$teachers->name}}" class="form-control"></br>
        <label>Matiere</label></br>
        <input type="text" name="material" id="material" value="{{$teachers->material}}" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" value="{{$teachers->email}}" class="form-control"></br>
        <label>Telephone</label></br>
        <input type="text" name="mobile" id="mobile" value="{{$teachers->mobile}}" class="form-control"></br>
        <div class="mb-3">
          <label> Télécharger la photo</label>
          <input type="file" name="image" accept="image/*">
          </div>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop