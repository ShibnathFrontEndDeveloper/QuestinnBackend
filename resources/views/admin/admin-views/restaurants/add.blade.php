
@extends('admin.layouts.sidebar')
@section('content')

<div class="card">
    <div class="card-body">
        <a href="{{route('admin.restaurants.list')}}"><h5 class="btn btn-primary mt-4">Foods</h5></a>

      <!-- Floating Labels Form -->
      <form class="row g-3" action="{{route('admin.restaurants.add')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Name:</label>
          <div class="col-sm-10">                                                                                                             
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="for_type" name="name" placeholder="Enter name" >                           
            @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>                          
        </div>

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Email:</label>
          <div class="col-sm-10">                                                                                                             
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="for_type" name="email" placeholder="Enter name" >                           
            @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>                          
        </div>

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Mobile:</label>
          <div class="col-sm-10">                                                                                                             
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="for_type" name="phone" placeholder="Enter name" >                           
            @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>                          
        </div>

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Address:</label>
          <div class="col-sm-10">                                                                                                             
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="for_type" name="address" placeholder="Enter name" >                           
            @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>                          
        </div>
               
       
        <!-- <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Food Category: </label>
          <div class="col-sm-4">                                                                                                             
            <select class="form-control" name="foodCat_id" onchange="foodcategory(this.value)">
            <option value="" selected disabled>select</option>
                @foreach($categories as $keys => $values)
                <option value="{{$values->id}}">{{$values->name}}</option>
                @endforeach
            </select>                        
            @if ($errors->has('foodCat_id'))
              <span class="text-danger">{{ $errors->first('foodCat_id') }}</span>
            @endif
          </div> 
          <div class="col-sm-6">
            <h5 class="text-info"><strong>Once you change food category it will effect from the last row</strong></h5>
          </div>                         
        </div> -->

        <div id="dynamicCastBody">
          <div class="row mb-3" id="dynamicAddRemove">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Foods:</label>
              <!-- <div class="col-sm-3">                                                                                                             
                <select class="select2-multiple form-control" id="select2Multiple0" name="food_ids" onchange="foods(this.value)">
                <option value="" selected disabled>select</option>
                                      
                </select>                        
                @if ($errors->has('foodCat_id'))
                  <span class="text-danger">{{ $errors->first('foodCat_id') }}</span>
                @endif
              </div> -->

              <div class="col-sm-3">                                                                                                             
                <input type="text" class="form-control @error('amount') is-invalid @enderror" name="items[]"  placeholder="Enter item name" value="">                           
                @if ($errors->has('qty'))
                  <span class="text-danger">{{ $errors->first('qty') }}</span>
                @endif
              </div>
                    
              <div class="col-sm-3">                                                                                                             
                <input type="number" class="form-control @error('amount') is-invalid @enderror" name="qty[]"  placeholder="Enter Quantity" value="">                           
                @if ($errors->has('qty'))
                  <span class="text-danger">{{ $errors->first('qty') }}</span>
                @endif
              </div> 
          
              <div class="col-sm-3">                                                                                                             
                <input type="number" class="form-control @error('amount') is-invalid @enderror" id="foodPrice0" name="amount[]" placeholder="Enter amount" >                           
                @if ($errors->has('amount'))
                  <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
              </div> 

              <div class="text-center col-sm-1">
                <button type="button" class="form-control btn btn-primary" onclick="addSection()">Add</button>          
              </div>
          </div>
        </div>
        

        <!-- <div class="row mb-3">
          
          
          
          <div class="col-sm-2">                                                                                                             
            <input type="number" class="form-control @error('amount') is-invalid @enderror" name="qty" placeholder="Enter Quantity" >                           
            @if ($errors->has('amount'))
              <span class="text-danger">{{ $errors->first('amount') }}</span>
            @endif
          </div> 
        </div> -->


        <!-- <div class="row mb-3">
                                   
        </div> -->


        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="{{route('admin.restaurants.list')}}" type="button" class="btn btn-secondary">Back</a>
        </div>
      </form><!-- End floating Labels Form -->

    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


@endsection