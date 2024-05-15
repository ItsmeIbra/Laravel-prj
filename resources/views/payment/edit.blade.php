@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Modifier paiement Page</div>
  <div class="card-body">
      
      <form action="{{ url('/payment/' .$payment->id) }}" method="post" enctype="multipart/form-data">
       @csrf
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$payment->id}}" id="id" />
        <p>Methode de paiement</p></br>
        <select id="pay" class="form-control" name="type_of_pay">
          <option value="virement">virement</option>
          <option value="espace">espace</option>
        </select>
        <label>Date de paiement</label></br>
        <input type="date" name="paid_data" id="paid_data" value="{{$payment->paid_data}}" class="form-control"></br>
        <label>Montant</label></br>
        <input type="text" name="amount" id="address" value="{{$payment->amount}}" class="form-control"></br>
        
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop
