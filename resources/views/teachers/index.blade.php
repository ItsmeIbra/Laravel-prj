@extends('layout')
@section('content')
   
                <div class="card">
                    <div class="card-header">
                        <h2>Teachers</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{url('teachers/create')}} " class="btn btn-success btn-sm" title="Add New Student">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        @if (session('success'))
                       <div class="alert alert-success">
                         {{ session('success') }}
                       </div>
                       @endif
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Photo personnelle</th>
                                        <th>Nam</th>
                                        <th>Matiere</th>
                                        <th>Emial</th>
                                        <th>Telephone</th>
                                        <th>Actions</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($teachers as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('imgs/' . $item->img) }}" style="width:60px; height:60px;" alt='img'></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->material}}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->mobile }}</td>
 
                                        <td>
                                            <a href="{{ url('/teachers/' . $item->id) }}" title="View Teachers"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Afficher</button></a>
                                            <a href="{{ url('/teachers/' . $item->id . '/edit') }}" title="Edit teachers"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
 
                                            <form method="POST" action="{{ url('/teachers' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <a href="{{ url('/teachers/' . $item->id) }}" title="Delete teachers"> <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            
                            <div classe="pagination-container d-flex justify-content-center">
                            {{$teachers-> links('pagination::bootstrap-5')}} </div>

                        </div>
 
                    </div>
                </div>
@endsection