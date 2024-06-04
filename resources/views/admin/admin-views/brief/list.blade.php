@extends('admin.layouts.sidebar')
@section('content')

<div class="card">
    <div class="card-body">
      <a href="{{route('admin.brief.addView')}}"><h5 class="btn btn-primary mt-4">Add a Brief</h5></a>
      <!-- Table with stripped rows -->
      <table class="table datatable table-striped">
        <thead>
          <tr>
            <th scope="col">Sl</th>
            <th scope="col">Name</th>
            <th scope="col">Title</th>
            <th scope="col">Images</th>
            <th scope="col">Ratings</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach($briefs as $keys => $values)
          <tr>
            <td scope="row">{{$keys+1}}</td>
            <td scope="row">{{$values->name}}</td>
            <td scope="row">{{$values->title}}</td>
            @php $images = json_decode($values->images,true) @endphp
            <td scope="row">
              @foreach($images as $imkeys => $imvalues)
              <img src="{{asset('public/uploads/'.$imvalues)}}" width="50px">
              @endforeach
            </td>            
            <td scope="row">{{$values->rating}}</td>
            <td scope="row">{{Str::limit($values->description,20)}}</td>                                  
            <td scope="row">
                <!-- <a class="btn btn-danger btn-sm delete" title="Delete banner" style="cursor: pointer;"
                    href="{{route('admin.brief.delete',$values->id)}}"><i class="fas fa-trash"></i>Delete</a> -->
                <a class="btn btn-primary btn-sm edit" title="Edit property" style="cursor:pointer;"
                    href="{{route('admin.brief.edit',$values->id)}}"><i class="fas fa-edit"></i>Edit</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>


@endsection  
