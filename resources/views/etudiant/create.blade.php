@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">
    
     @if(Session::has('success'))
    <div class="alert alert-success" role="alert"
    {{Session::get('success')}} </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
    <h3>Errors :</h3>
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    </ul>
    </div>
    @endif
   
    
     
   
       
          <form action=" {{route('etudiant.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label>Name</label></br>
            <input type="text" name="name" id="name" class="form-control"></br>
            {{-- @error('name')
    <div class="text-danger">{{$message}}</div>
    @enderror --}}
            <label>Level</label></br>
            <input type="text" name="level" id="level" class="form-control"></br>
            {{-- @error('age')
    <div class="text-danger">{{$message}}</div>
    @enderror --}}
            <label>Email</label></br>
            <input type="text" name="email" id="email" class="form-control"></br>
            {{-- @error('address')
    {{-- <div class="text-danger">{{$message}}</div>
    @enderror --}} 
            <label>Mobile</label></br>
            <input type="text" name="mobile" id="mobile" class="form-control"></br>
            <div class="mb-3">
            <label> upload the photo</label>
            <input type="file" name="image" accept="image/*">
            </div>
           
           
            {{-- @error('mobile')
    {{-- <div class="text-danger">{{$message}}</div>
    @enderror --}} 
            <input type="submit" value="Save" class="btn btn-success"></br>
        </form>
       
      </div>
    </div>
     

  </div>
</div>
 
@stop