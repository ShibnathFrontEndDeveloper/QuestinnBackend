
<style>
    .tabel_responsive{
        width:100%;
        overflow:hidden;
        overflow-x: auto;
    }
    .tabel_responsive th{
        font-size:16px;
        width:20%;
        padding:0;
    }
    .room_btn {
        width: 112px !important;
        font-size: 15px !important;
        padding: 7px 6px !important;
    }
    .tabel_responsive .form-control{
        width:85px;
    }
   .tabel_responsive tr>td{
       width:150px;
   }
   .tabel_responsive .table_stat{
       /*background:red;*/
       width:120px !important;
   }
   .tabel_responsive .table_stat a{
       display:block ;
       width:100px;
   }
   .tabel_responsive .table_stat_cust a{
       width:180px !important;
   }
</style>


@extends('admin.layouts.sidebar')

@section('content')
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Order List</h5>
              <p><code></code></p>
              <!-- Table Variants -->
              <div class="tabel_responsive">
                  <table class="table datatable table-striped">
                <thead>
                  <tr>
                    <th class="table_stat">Sl</th>
                    <th class="table_stat">OrderId</th>
                    <th class="table_stat_cust">TransactionId</th>
                    <th class="table_stat_cust">paymet Proff</th>
                    <th class="table_stat_cust">Customer</th>
                    <th class="table_stat_cust">Room Name</th>
                    <th class="table_stat">Payment Method</th>
                    <th class="table_stat">Check-in</th>
                    <th class="table_stat">Check-Out</th>
                    <th class="table_stat">Quantity</th>
                    <th class="table_stat">Room No.</th>
                    <th class="table_stat">Paid Status</th>                    
                    <th class="table_stat">Total</th>
                    <th class="table_stat">Status</th>
                    <!--<th class="table_stat">check-in-status</th>-->
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach($order as $keys => $values)
                  <tr>
                    <td>{{$keys+1}}</td>
                    <td>{{$values->id}}</td>
                    @if($values->transaction_id == '')
                      <td>---</td>
                    @else
                     <td>{{$values->transaction_id}}</td>
                    @endif
                    @if($values->screen_shot)
                    <td><img src="{{asset('public/storage/food_scrnshots/'.@$values->screen_shot)}}" width="80px" data-bs-toggle="modal" data-bs-target="#srrnshotmodal{{$keys}}"></td>
                    @else
                    <td>---</td>
                    @endif
                    <td>{{$values->users->name}}</td>
                    <td>{{@$values->rooms->title}}</td>
                    <td>{{$values->payment_method == 'qr_code' ? 'QR Code' : 'Pay Later'}}</td>
                    <td>{{$values->from_date}}</td>
                    <td>{{$values->to_date}}</td>
                    <td>{{$values->quantity}}</td>
                    <td>
                      @if($values->room_no != null)                        
                        {{implode(',',json_decode($values->room_no,true))}}
                      @else
                      <div class="">
                        <button class="btn btn-primary room_btn" onclick="assignn_roomNo('{{$values->room_id}}','{{$values->id}}','{{$values->from_date}}','{{$values->to_date}}')">Assign Room</button>
                        <!-- <input type="number" name="room_no" class="form-control" placeholder="Assign Room No"> -->
                      </div>
                      @endif
                    </td>
                    <td>
                      <select name="payment_status" id="payment_status" class="form-control" onchange="paid_status(<?php echo $values->id ?>,this.value)">
                        <option value="paid" @selected($values->paid_status == 'paid')>Paid</option>
                        <option value="unpaid" @selected($values->paid_status == 'unpaid')>Unpaid</option>
                      </select>
                    </td>                    
                    <td>{{$values->nett_amount}}</td>
                    <td>
                        @if($values->status == 'pending')
                        <a href="javascript:void" onclick="status('confirmed',<?php echo $values->id ?>)"><span class="badge bg-primary">Pending</span></a>   
                        @else
                        <a href="javascript:void" onclick="status('pending',<?php echo $values->id ?>)" ><span class="badge bg-success" >Confirmed</span></a>   
                        @endif
                    </td>
                    <!--<td>-->
                    <!--    @if($values->check_in_status == 1) -->
                    <!--    <a href="{{route('admin.users.status',['value' => 0, 'user_id' => $values->id])}}"><span class="badge bg-success">checked-in</span></a>-->
                    <!--    @else-->
                    <!--    <a href="{{route('admin.users.status',['value' => 1, 'user_id' => $values->id])}}"><span class="badge bg-danger">checked-out</span></a>-->
                    <!--    @endif-->
                    <!--</td>  -->
                  </tr>
                  
                <div class="modal fade" id="srrnshotmodal{{$keys}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Screen shot</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                   <img src="{{asset('public/storage/food_scrnshots/'.@$values->scrn_shots)}}" width="350px"> 
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                              </div>
                            </div>
                          </div>
                    </div>
                  
                  
                  @endforeach
                  
                </tbody>
                
              </table>
              </div>
              
              <!-- End Table Variants -->

            </div>
          </div>

  <script>
    // function assign_room(value,order_id){        
    //    var room_no = value.split(",");
    //    console.log(room_no);
    //    $.ajax({
    //       type:'POST',
    //       url:'{{route("admin.roomorders.assign_room_no")}}',
    //       data: {
    //             "_token": "{{ csrf_token() }}",
    //             "data": room_no,
    //             "id" : order_id,   
    //           },          
    //           success:function(data){
                
    //           }
    //     });
    // }

    function assignn_roomNo(value,orderId,from_date,to_date){
      $.ajax({
          type:'POST',
          url:'{{route("admin.roomorders.assign_room_no")}}',
          data: {
                "_token": "{{ csrf_token() }}",
                "data": value,
                "orderId": orderId, 
                "from_date": from_date, 
                "to_date": to_date, 
                
              },          
              success:function(data){                
                $('#exampleModal').modal('show');
                $('#quick-view-modal').empty().html(data.view);
              }
        });
    }

    function status(status,id){      
      if(status == 'confirmed'){
        Swal.fire({
                title: '{{'Are you sure Change to Confirmed'}}?',
                text: "{{'You will not be able to revert this'}}!",
                showCancelButton: true,
                confirmButtonColor: '#377dff',
                cancelButtonColor: 'secondary',
                confirmButtonText: '{{'Yes, Change it'}}!'
            }).then((result) => {
                if (result.value) {
                    
                    $.ajax({                      
                        url: "{{route('admin.roomorders.status')}}",
                        method: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id,
                            "order_status": status
                        },
                        success: function (data) {
                          console.log(data);
                            if (data.success == 0) {
                                //toastr.success('{{'something went wrong'}} !!');
                                location.reload();
                            } else {
                                //toastr.success('{{'Status Change successfully'}}!');
                                location.reload();
                            }

                        }
                    });
                }
            });
      }else if(status == 'pending'){
        Swal.fire({
                title: '{{'QuestInn'}}?',
                text: "{{'You will not be able to revert this'}}!",
                showCancelButton: true,
                confirmButtonColor: '#377dff',
                cancelButtonColor: 'secondary',
                // confirmButtonText: '{{'Yes, Change it'}}!'
          });
      }
                
    }

    function paid_status(id,status){
      Swal.fire({
                title: '{{'Are you sure Change to Confirmed'}}?',
                text: "{{'You will not be able to revert this'}}!",
                showCancelButton: true,
                confirmButtonColor: '#377dff',
                cancelButtonColor: 'secondary',
                confirmButtonText: '{{'Yes, Change it'}}!'
            }).then((result) => {
                if (result.value) {
                    
                    $.ajax({                      
                        url: "{{route('admin.roomorders.paidStatus')}}",
                        method: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id,
                            "paid_status": status
                        },
                        success: function (data) {
                          console.log(data);
                            if (data.success == 0) {
                                //toastr.success('{{'something went wrong'}} !!');
                                location.reload();
                            } else {
                                //toastr.success('{{'Status Change successfully'}}!');
                                location.reload();
                            }

                        }
                    });
                }
            });
    }  

  </script>

@endsection          

