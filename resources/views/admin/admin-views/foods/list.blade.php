@extends('admin.layouts.sidebar')
@section('content')

<div class="card">
    <div class="card-body">
      <a href="{{route('admin.foods.addView')}}"><h5 class="btn btn-primary mt-4">Add Foods</h5></a>
      <!-- Table with stripped rows -->
      <table class="table datatable table-striped">
        <thead>
          <tr>
            <th scope="col">Sl</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Amount</th>
            <th scope="col">Category</th>
            <th scope="col">status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach($foods as $keys => $values)
          <tr>
            <td scope="row">{{$keys+1}}</td>
            <td scope="row">{{$values->name}}</td>
            <td scope="row"><img src="{{asset('public/storage/foods/'.$values->image)}}" width="80px"></td>
            <td scope="row">{{$values->amount}}</td>
            <td scope="row">{{$values->category->name}}</td>
            @if($values->status == 1)
              <td><a href="{{url('admin/food/status/'.$values->id.'/'.'0')}}"><span class="badge bg-success">Active</span></a></td> 
            @else
              <td><a href="{{url('admin/food/status/'.$values->id.'/'.'1')}}"><span class="badge bg-danger">Inactive</span></a></td>  
            @endif                         
            <td scope="row">
                <a class="btn btn-danger btn-sm delete" title="Delete banner" style="cursor: pointer;"
                    href="{{route('admin.foods.delete',$values->id)}}"><i class="fas fa-trash"></i>Delete</a>
                <a class="btn btn-primary btn-sm edit" title="Edit property" style="cursor:pointer;"
                    href="{{route('admin.foods.edit',$values->id)}}"><i class="fas fa-edit"></i>Edit</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>


@endsection  
