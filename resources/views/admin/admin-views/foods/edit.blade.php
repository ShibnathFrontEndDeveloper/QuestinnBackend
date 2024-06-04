
@extends('admin.layouts.sidebar')
@section('content')

<div class="card">
    <div class="card-body">
        <a href="{{route('admin.foods.list')}}"><h5 class="btn btn-primary mt-4">Foods</h5></a>

      <!-- Floating Labels Form -->
      <form class="row g-3" action="{{route('admin.foods.update',$edit->id)}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Name:</label>
          <div class="col-sm-10">                                                                                                             
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="for_type" name="name" value="{{$edit->name}}" >                           
            @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>                          
        </div>


        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Image: </label>
          <div class="col-sm-10">                                                                                                             
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="for_type" name="image" value="Enter title" >                           
            <img src="{{asset('public/storage/foods/'.$edit->image)}}" width="100px;">
            @if ($errors->has('image'))
              <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
          </div>                          
        </div>

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Amount: </label>
          <div class="col-sm-10">                                                                                                             
            <input type="number" class="form-control @error('amount') is-invalid @enderror" id="for_type" name="amount" value="{{$edit->amount}}" >                           
            @if ($errors->has('amount'))
              <span class="text-danger">{{ $errors->first('amount') }}</span>
            @endif
          </div>                          
        </div>

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Categoy: </label>
          <div class="col-sm-10">                                                                                                             
            <select class="form-control @error('foodCat_id') is-invalid @enderror" name="foodCat_id">            
                @foreach($categories as $keys => $values)
                <option value="{{$values->id}}" @selected($edit->foodcategory_id == $values->id)>{{$values->name}}</option>
                @endforeach
            </select>                        
            @if ($errors->has('foodCat_id'))
              <span class="text-danger">{{ $errors->first('foodCat_id') }}</span>
            @endif
          </div>                          
        </div>
        
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Description: </label>
          <div class="col-sm-10">                                                                                                             
        	<textarea class="form-control" name="description" id="editor">{!!$edit->description!!}</textarea>                
            @if ($errors->has('description'))
              <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
          </div>                          
        </div>



        <div class="text-center">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{route('admin.foods.list')}}" type="button" class="btn btn-secondary">Back</a>
        </div>
      </form><!-- End floating Labels Form -->

    </div>
  </div>

  @endsection