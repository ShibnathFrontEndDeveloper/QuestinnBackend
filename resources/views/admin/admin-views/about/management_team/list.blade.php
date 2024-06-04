@extends('admin.layouts.sidebar')
@section('content')
          <div class="card">          
            <div class="card-body">
            <a href="{{route('admin.about.management_team.addView')}}"><h5 class="card-title">Management Add</h5></a>              
              <!-- Table Variants -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>                    
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                 
                  @foreach($list as $keys => $values)
                  <tr class="table datatable">
                    <td>{{$keys+1}}</td>
                    <td>{{$values->name}}</td>
                    <td><img src="{{asset('public/storage/about/'.$values->image)}}" width="120px"></td>                    
                    <td>
                        <a class="btn btn-danger" style="cursor: pointer;"
                        href="{{route('admin.about.management_team.delete',$values->id)}}"><i class="fas fa-trash"></i>delete</a>
                        <a class="btn btn-primary" style="cursor:pointer;"
                        href="{{route('admin.about.management_team.edit',$values->id)}}"><i class="fas fa-edit"></i>edit</a>   
                    </td>
                  </tr>
                  @endforeach                                                    
                </tbody>
                
              </table>
              <!-- End Table Variants -->

            </div>
          </div>

@endsection          

