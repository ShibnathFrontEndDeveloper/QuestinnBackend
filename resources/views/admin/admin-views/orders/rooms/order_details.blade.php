
@extends('admin.layouts.sidebar')
@section('content')

<div class="row">
<div class="card col-md-8" >
    <div class="card-body">
      <h5 class="card-title">Vehicle Details</h5>
      <input type="hidden" class="form-control" name="order_id" value="{{$order->id}}" id="order_id">
      <select name="status" class="form-control" onchange="status(this.value)">
        <option value="pending" {{$order->order_status == 'pending'?'selected':''}}>Pending</option>
        <option value="process" {{$order->order_status == 'process'?'selected':''}}>Process</option>
        <option value="complete" {{$order->order_status == 'complete'?'selected':''}}>Complete</option>
      </select>
      <!-- Table with hoverable rows -->
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">OrderId</th>
            <th scope="col">Veh Type</th>
            <th scope="col">Veh Model</th>
            <th scope="col">Veh Color</th>
            <th scope="col">Veh No</th>
            <th scope="col">Add Opt</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">{{$order->id}}</th>
            <td>{{$order->vehicle_type}}</td>
            <td>{{$order->vehicle_model}}</td>
            <td>{{$order->vehicle_color}}</td>
            <td>{{$order->vehicle_no}}</td>
            <td>{{Str::limit(implode(',',$options))}}</td>
          </tr>
          
        </tbody>
      </table>
      <!-- End Table with hoverable rows -->
    </div>
  </div>


  <div class="card col-md-3" style="margin-left: 20px;">
    <div class="card-body">
      <h5 class="card-title">Customer</h5>
      <hr>
      <div class="media-body">
        <span>{{$order->users->name}}</span>
      </div>
      <hr>
      <div class="d-flex justify-content-between align-items-center">
        <h5>{{'Contact Info'}}</h5>
      </div>

      <ul class="list-unstyled list-unstyled-py-2">
        <li>
          <i class="fas fa-at"></i>
            {{$order->users['email']}}
        </li>
        <li>
            <i class="tio-android-phone-vs mr-2"></i>
            {{$order->users['phone_no']}}
        </li>
      </ul>
      <hr>
      <div class="d-flex justify-content-between align-items-center">
        <h5>{{'Customer Address'}}</h5>
      </div>
      <hr>
      <span class="d-block">
        {{'Name'}} :
        <strong>{{$order->users->name}}</strong><br>
        {{'Phone'}}:
        <strong>{{$order->users->phone_no}}</strong>
        {{'Address'}}:
        <strong>{{$order->cust_address}}</strong><br>
        </span>
    </div>
  </div>
</div>

  @endsection

  <script>
    function status(value){
      var _token = $('meta[name="csrf-token"]').attr('content')
      const orderId = document.getElementById('order_id').value;
        $.ajax({
           url: "{{route('admin.orders.status')}}",
           type: 'post',
           data: {
                  status : value,
                  ordreId : orderId,
                  _token: _token, 
                },
           dataType: "json",
           success: function(data){
              if(data.status == 'Successful'){
                Swal.fire(
                  'Status Changed Successfully',
                  'You clicked the button!',
                  'success'
                )
                setTimeout(function () {
                  location.reload(true);
                }, 2000);
              }else {
                Swal.fire(
                  'Something Went Wrong',
                  'You clicked the button!',
                  'error'
                ) 
              }
        }});
    }
  </script>
