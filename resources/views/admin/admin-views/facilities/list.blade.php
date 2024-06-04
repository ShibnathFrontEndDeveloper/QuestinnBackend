@extends('admin.layouts.sidebar')
@section('content')

<div class="card">
    <div class="card-body">
      <a href="{{route('admin.facilities.addView')}}"><h5 class="btn btn-success mt-4">Add Facilities</h5></a>
      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Sl</th>
            <th scope="col">Name</th>
            <th scope="col">Icon</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach($facilities as $keys => $values)
          <tr>
            <td scope="row">{{$keys+1}}</td>
            <td scope="row">{{$values->name}}</td>
            <td scope="row"><img src="{{asset('public/storage/facilities/'.$values->icon)}}" width="80px"></td>
            <td scope="row">{!!Str::limit($values->desc,100)!!}</td>
            <td scope="row">
                <a class="btn btn-danger btn-sm delete" title="Delete banner" style="cursor: pointer;"
                    href="{{route('admin.facilities.delete',$values->id)}}"><i class="fas fa-trash"></i>Delete</a>
                <a class="btn btn-primary btn-sm edit" title="Edit property" style="cursor:pointer;"
                    href="{{route('admin.facilities.edit',$values->id)}}"><i class="fas fa-edit"></i>Edit</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>


@endsection  
