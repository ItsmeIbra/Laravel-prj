@extends('layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Information de paiement</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Methode de paiement : {{ $payment->type_of_pay }}</h5>
        <p class="card-text">Date de paiement : {{ $payment->paid_date }}</p>
        <p class="card-text">Montant : {{ $payment->amount }}</p>
       
  </div>
       
    </hr>
  
  </div>
</div>
@endsection