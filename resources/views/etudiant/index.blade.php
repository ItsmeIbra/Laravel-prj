@extends('layout')
@section('content')
   <div class="card">
    <div class="card-header">
     <h2>Etudiant</h2>
     </div>
    <div class="card-body">
    <a href="{{url('etudiant/create')}} " class="btn btn-success btn-sm" title="Add New Student">
      <i class="fa fa-plus" aria-hidden="true"></i> Add New
      </a>
     <br/>
    <br/>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
    <table class="table">
     <thead>
      <tr>
      <th>ID</th>
        <th>image</th>
       <th>Name</th>
       <th>Level</th>
       <th>email</th>
       <th>Mobile</th>
                                        
       </tr>
         </thead>
        <tbody>
        @foreach($students as $item)
          <tr>
             <td>{{ $loop->iteration }}</td>
             <td><img src="{{ asset('images/' . $item->image) }}" style="width:60px; height:60px;" alt='img'></td>

            <td>{{ $item->name }}</td>
            <td>{{ $item->level}}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->mobile }}</td>
 
         <td>
         <a href="{{ url('/etudiant/' . $item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
          <a href="{{ url('/etudiant/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
          <form method="POST" action="{{ url('/etudiant/' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
           {{ method_field('DELETE') }}
              @csrf
              <a href="{{ url('/etudiant/' . $item->id) }}" title="Delete Student"> <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                </form>
                    </td>
                       </tr>
                          @endforeach
                            </tbody>
                            </table>
                            <div class="pagination-container d-flex justify-content-center">
                                {{ $students->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
 
                    </div>
                </div>
@endsection