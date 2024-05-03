@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
    <form action="{{ route('etudiant.update', $students->id) }}" method="post" enctype="multipart/form-data">

       @csrf
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$students->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$students->name}}" class="form-control"></br>
        <label>Level</label></br>
        <input type="text" name="level" id="level" value="{{$students->level}}" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" value="{{$students->email}}" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" value="{{$students->mobile}}" class="form-control"></br>
        <div class="mb-3">
          <label> upload the photo</label>
          <input type="file" name="image" accept="image/*">
          </div>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop