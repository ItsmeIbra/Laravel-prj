@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Paiement Page</div>
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
   
      <form action=" {{route('payment.store')}}" method="post">
        @csrf
        <label for="pay">Methode de payment:</label>

<select id="pay" class="form-control" name="type_of_pay">
  <option value="virement">virement</option>
  <option value="espace">espace</option>
</select>
 <br>
        
        <label>Date de paiement</label></br>
        <input type="date" name="paid_data" id="paid date" class="form-control"></br>
       

        <label>Montant</label></br>
        <input type="text" name="amount" id="amount" class="form-control"></br>
      
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop