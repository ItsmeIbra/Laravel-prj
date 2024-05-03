@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Payment Page</div>
  <div class="card-body">
      
      <form action="{{ url('/payment/' .$payment->id) }}" method="post" enctype="multipart/form-data">
       @csrf
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$payment->id}}" id="id" />
        <p>Payment method</p></br>
        <input type="radio" id="html" name="type_of_pay" value="esp" class="form-control">
        <label for="html">Espace</label><br>
        <input type="radio" id="css" name="type_of_pay" value="ver" class="form-control">
        <label for="css">Virement</label></br>
        <label>Date</label></br>
        <input type="text" name="paid_date" id="paid_date" value="{{$payment->paid_date}}" class="form-control"></br>
        <label>Amount</label></br>
        <input type="text" name="amount" id="address" value="{{$payment->amount}}" class="form-control"></br>
        
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop