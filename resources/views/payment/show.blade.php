@extends('layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Payment information</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">payment method : {{ $payment->type_of_pay }}</h5>
        <p class="card-text">paid date : {{ $payment->paid_date }}</p>
        <p class="card-text">amount : {{ $payment->amount }}</p>
       
  </div>
       
    </hr>
  
  </div>
</div>
@endsection