@extends('admin.layouts.sidebar')
@section('content')
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Order List</h5>
              <p><code></code></p>
              <!-- Table Variants -->
              <table class="table datatable table-striped">
                <thead>
                  <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">OrderId</th>
                    <th scope="col">Customer</th>                                        
                    <th scope="col">Room</th>                                        
                    <th scope="col">Total</th>
                    <th scope="col">Transaction Id</th>
                    <th scope="col">Screen shots</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Paid Status</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach($orders as $keys => $values) 
                                
                  <tr>
                    <td>{{$keys+1}}</td>
                    <td>{{$values->id}}</td>
                    <td>{{$values->users->name}}</td>                                                                                
                    <td>{{$values->rooms_id->title}}</td>                    
                    <td>₹ {{$values->total_amount}}</td>
                    @if($values->transaction_id == '')
                      <td>---</td>
                    @else
                     <td>{{$values->transaction_id}}</td>
                    @endif
                    @if($values->scrn_shots)
                    <td><img src="{{asset('public/storage/food_scrnshots/'.@$values->scrn_shots)}}" width="80px" data-bs-toggle="modal" data-bs-target="#srrnshotmodal{{$keys}}"></td>
                    @else
                    <td>---</td>
                    @endif
                    <td>{{$values->payment_method}}</td>
                    <td>@if($values->paid_status == 'unpaid')
                    <a href="{{route('admin.foods.food_paid_status',['value' => 'paid', 'id' => $values->id])}}"><span class="badge bg-primary">Pending</span></a>   
                    @else
                    <span class="badge bg-success">Confirmed</span> 
                    <!--<a href="{{route('admin.foods.food_paid_status',['value' => 'unpaid', 'id' => $values->id])}}"><span class="badge bg-success">Confirmed</span></a>   -->
                    @endif</td>
                    <td>
                    <a href="{{route('admin.foods.order_view',$values->id)}}"><span class="badge bg-primary">View</span></a>
                    </td>
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
              
                
              <!-- End Table Variants -->

            </div>
          </div>



@endsection          

