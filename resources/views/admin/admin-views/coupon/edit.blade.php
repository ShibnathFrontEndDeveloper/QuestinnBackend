
@extends('admin.layouts.sidebar')
@section('content')

<div class="card">
    <div class="card-body">
        <a href="{{route('admin.facilities.list')}}"><h5 class="btn btn-success mt-4">Facilities</h5></a>

      <!-- Floating Labels Form -->
      <form class="row g-3" action="{{route('admin.facilities.update',$edit->id)}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Name:</label>
          <div class="col-sm-10">                                                                                                             
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="for_type" name="name" value="{{$edit->name}}" >                           
            @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>                          
        </div>


        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Icon: </label>
          <div class="col-sm-10">                                                                                                             
            <input type="file" class="form-control @error('title') is-invalid @enderror" id="for_type" name="icon">                           
            <img src="{{asset('public/storage/facilities/'.$edit->icon)}}" width="80px;">
            @if ($errors->has('icon'))
              <span class="text-danger">{{ $errors->first('icon') }}</span>
            @endif
          </div>                          
        </div>

        <div class="row mb-5">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Content:</label>
            <div class="col-sm-10 mb-5">                             
            <textarea class="tinymce-editor @error('content') is-invalid @enderror" name="desc">
            {{$edit->desc}}</textarea>
            @if ($errors->has('content'))
            <span class="text-danger">{{ $errors->first('content') }}</span>
            @endif
            </div>                            
        </div>
        

        <div class="text-center">
          <button type="submit" class="btn btn-primary">UPdate</button>
          <a href="{{route('admin.facilities.list')}}" type="button" class="btn btn-secondary">Back</a>
        </div>
      </form><!-- End floating Labels Form -->

    </div>
  </div>

  @endsection