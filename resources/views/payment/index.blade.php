@extends('layout')
@section('content')
   
<div class="card">
   <div class="card-header">
     <h2>Paymnt</h2>
      </div>
     <div class="card-body">
        <a href="{{url('payment/create')}} " class="btn btn-success btn-sm" title="Add New Student">
        <i class="fa fa-plus" aria-hidden="true"></i> Add New </a>
    <br/>
    @if (session('success'))
          <div class="alert alert-success">
          {{ session('success') }}
    @endif
       </div>
        <br/>
          <div class="table-responsive">
           <table class="table">
            <thead>
                 <tr>
                 <th>ID</th>
                <th>Methode de paiement</th>
                <th>Date de paiement</th>
                 <th>Monatnt</th>
              </tr>
             </thead>
                <tbody>
                @foreach($payment as $item)
                    <tr>
                     <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->type_of_pay }}</td>
                    <td>{{ $item->paid_data}}</td>
                     <td>{{ $item->amount }}</td>
                    <td>
            <a href="{{ url('/payment/' . $item->id) }}" title="View payment"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Afficher</button></a>
            <a href="{{ url('/payment/' . $item->id . '/edit') }}" title="Edit pay"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
 
    <form method="POST" action="{{ url('/payment' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
        {{ method_field('DELETE') }}
           @csrf
         <a href="{{ url('/payment/' . $item->id) }}" title="Delete Student"> <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>Supprimer</button>
          </form>
         </td>
            </tr>
        @endforeach
         </tbody>
           </table>
              <div class="pagination-container d-flex justify-content-center">
             {{ $payment->links('pagination::bootstrap-5') }}
         </div>
         </div>
 
     </div>
</div>
@endsection