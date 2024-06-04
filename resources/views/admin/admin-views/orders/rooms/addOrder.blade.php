
@extends('admin.layouts.sidebar')
@section('content')

<div class="card">
    <div class="card-body">
        <!-- <a href=""><h5 class="btn btn-primary ">Place Order</h5></a> -->

      <!-- Floating Labels Form -->
      <form class="row g-3 mt-5" action="{{route('admin.booking.store')}}" method="POST" enctype="multipart/form-data" >
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
            <input type="email" class="form-control @error('name') is-invalid @enderror" id="for_type" name="email" placeholder="Enter email" >                           
            @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>                          
        </div>

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Phone:</label>
          <div class="col-sm-10">                                                                                                             
            <input type="tel" class="form-control @error('name') is-invalid @enderror" id="for_type" name="phone" placeholder="Enter mobile number" >                           
            @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>                          
        </div>

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Address:</label>
          <div class="col-sm-10">                                                                                                             
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="for_type" name="address" placeholder="Enter address" >                           
            @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>                          
        </div>

        

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Id:</label>
          <div class="col-sm-10">                                                                                                             
          <select name="id_name" id="" class="form-select">
            <option value="" selected disabled>Select</option>
            <option value="pan_card">Pan Card</option>
            <option value="aadhar_card">Aadhaar Card</option>
            <option value="voter_card">Voter Card</option>
            <option value="driving_license">Driving Licence</option>
          </select>            
            @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>                          
        </div>

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Id Proff: </label>
          <div class="col-sm-10">                                                                                                             
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="for_type" name="id_proff" placeholder="Enter title" >                           
            @if ($errors->has('image'))
              <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
          </div>                          
        </div>

        

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Check-in:</label>
          <div class="col-sm-10">                                                                                                             
            <input type="date" class="form-control @error('name') is-invalid @enderror" id="for_type" name="check_in" placeholder="Enter name" >                           
            @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>                          
        </div>

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">check-out:</label>
          <div class="col-sm-10">                                                                                                             
            <input type="date" class="form-control @error('name') is-invalid @enderror" id="for_type" name="check_out" placeholder="Enter name" >                           
            @if ($errors->has('check_out'))
              <span class="text-danger">{{ $errors->first('check_out') }}</span>
            @endif
          </div>                          
        </div>

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Room:</label>
          <div class="col-sm-10">                                                                                                             
          <select name="room" class="form-control" id="for_type" onchange="room_change(this.value)">
          <option value="" selected disabled>Select</option>
          @foreach($rooms as $roomKey => $roomValue)
          <option value="{{$roomValue->id}}">{{$roomValue->title.' '.'(Availble'.' '.$roomValue->available_rooms.')'}}</option>
          @endforeach
          </select>                        
            @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>                          
        </div>

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">No. of Adults:</label>
          <div class="col-sm-10">                                                                                                             
            <input type="number" class="form-control @error('name') is-invalid @enderror" id="adults"  name="adults" value="" readonly>                           
            @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>                          
        </div>

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">No. of children:</label>
          <div class="col-sm-10">                                                                                                             
            <input type="number" class="form-control @error('name') is-invalid @enderror" id="childrens" name="childrens" value="" readonly>                           
            @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>                          
        </div>



        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">No. of Rooms:</label>
          <div class="col-sm-10">                                                                                                             
            <input type="number" class="form-control @error('name') is-invalid @enderror" id="quantity" onkeyup="update_quantity(this.value)" name="quantity" value="">                           
            @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>                          
        </div>
    
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Amount: </label>
          <div class="col-sm-10">                                                                                                             
            <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="">                           
            @if ($errors->has('amount'))
              <span class="text-danger">{{ $errors->first('amount') }}</span>
            @endif
          </div>                          
        </div>
                          
        <!-- <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Icon: </label>
          <div class="col-sm-10">                                                                                                             
            <select class="form-control @error('foodCat_id') is-invalid @enderror" name="foodCat_id">
            <option value="" selected disabled>select</option>
                @foreach($categories as $keys => $values)
                <option value="{{$values->id}}">{{$values->name}}</option>
                @endforeach
            </select>                        
            @if ($errors->has('foodCat_id'))
              <span class="text-danger">{{ $errors->first('foodCat_id') }}</span>
            @endif
          </div>                          
        </div> -->

        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="{{route('admin.foods.list')}}" type="button" class="btn btn-secondary">Back</a>
        </div>
      </form><!-- End floating Labels Form -->

    </div>
  </div>

  @endsection 
  
  <script>
    function room_change(value){
      $.ajax({
          type:'POST',
          url:'{{route("admin.booking.room-chenage")}}',
          data: {
              "_token": "{{ csrf_token() }}",              
              "id"  : value,                    
              },          
              success:function(data){ 
                let price = data.data.price;
                let quant  = data.data.available_rooms;
                let amount = price * quant;
              // let obj = JSON.parse(data.data);
              // console.log(data.data.price); 
                // console.log(obj);           
                document.getElementById("adults").value = data.data.adults;
                document.getElementById("childrens").value = data.data.childrens;
                document.getElementById("quantity").value = data.data.available_rooms;
                document.getElementById("amount").value = amount;
                localStorage.setItem("quantity", data.data.available_rooms);
                localStorage.setItem("single_room_amount", data.data.price);
            }
        });
    }

    function update_quantity(value){
      let quant = localStorage.getItem("quantity");
      let price = localStorage.getItem("single_room_amount");  
      let amount = value * price;           
      if(Number(value) > Number(quant)){
        Swal.fire(
          'Questinn!',
          'Not Available!',
          'error'											
        );
        amount = quant * price;
        document.getElementById("quantity").value = quant;0
        document.getElementById("amount").value = amount;
      }else {
        document.getElementById("amount").value = amount;
      }

        // $(document).on({            
        //     keyup: function(e) {
        //       let quant = localStorage.getItem("quantity");  
        //       console.log(value);      
        //       // if(value > quant){
        //       //   Swal.fire(
        //       //     'Questinn!',
        //       //     'Not Available!',
        //       //     'error'											
        //       //   );
        //       //   document.getElementById("quantity").value = quant;
        //       // }
        //     },
        //     click: function() {
        //        let quant = localStorage.getItem("quantity"); 
        //        console.log(value);             
        //       //  if(value > quant){
        //       //     Swal.fire(
        //       //       'Questinn!',
        //       //       'Not Available!',
        //       //       'error'											
        //       //     );
        //       //     document.getElementById("quantity").value = quant;
        //       // }
        //     }
        // });
    }
  </script>