
@extends('admin.layouts.sidebar')
@section('content')

<div class="card">
    <div class="card-body">
        <a href="{{route('admin.brief.list')}}"><h5 class="btn btn-primary mt-4">Brief</h5></a>

      <!-- Floating Labels Form -->
      <form class="row g-3" action="{{route('admin.brief.add')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Hotel Name:</label>
          <div class="col-sm-10">                                                                                                             
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="for_type" name="name" placeholder="Enter name" value="{{old('name')}}">                           
            @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>                          
        </div>

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Title:</label>
          <div class="col-sm-10">                                                                                                             
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="for_type" name="title" placeholder="Enter title" value="{{old('title')}}">                           
            @if ($errors->has('title'))
              <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
          </div>                          
        </div>

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Ratings:</label>
          <div class="col-sm-10">                                                                                                             
            <input type="number" class="form-control @error('name') is-invalid @enderror" id="for_type" name="ratings" placeholder="Enter ratings" value="{{old('ratings')}}">                           
            @if ($errors->has('ratings'))
              <span class="text-danger">{{ $errors->first('ratings') }}</span>
            @endif
          </div>                          
        </div>        



        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Images: </label>
          <div class="col-sm-10">                                                                                                             
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="images" name="image[]" multiple onchange="filesLength(this.files)">                           
            @if ($errors->has('image'))
              <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
          </div>                          
        </div>

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Description: </label>
          <div class="col-sm-10">                                                                                                             
          <textarea class="tinymce-editor @error('content') is-invalid @enderror" name="desc" >{{old('desc')}}
          </textarea>                           
            @if ($errors->has('desc'))
              <span class="text-danger">{{ $errors->first('desc') }}</span>
            @endif
          </div>                          
        </div>
        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="{{route('admin.brief.list')}}" type="button" class="btn btn-secondary">Back</a>
        </div>
      </form><!-- End floating Labels Form -->

    </div>
  </div>

  <script>
    function filesLength(files){
      console.log(files.length);
      if(files.length > 4){
        alert('maximum 4 files alloted');
        location.reload();
        // document.getElementById("images").files = null;
      }
    }
  </script>

  @endsection