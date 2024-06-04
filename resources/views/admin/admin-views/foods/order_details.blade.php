@extends('admin.layouts.sidebar')
@section('content')
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Order Details</h5>
              <p><code></code></p>
              <!-- Table Variants -->
              <table class="table datatable table-striped">
                <thead>
                  <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">OrderId</th>
                    <th scope="col">Customer</th>                                        
                    <th scope="col">Room No</th>                                        
                    <th scope="col">Foods</th>                                        
                    <th scope="col">Quantity</th>                                        
                    <th scope="col">Amount</th>
                    <th scope="col">Total</th>                    
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach($details as $keys => $values) 
                                
                  <tr>
                    <td>{{$keys+1}}</td>
                    <td>{{@$values->order_id}}</td>
                    <td>{{@$values->users->name}}</td>                                                                                
                    <td>{{@$values->room_no}}</td>                    
                    <td>{{@$values->foods->name}}</td>
                    <td>{{@$values->quantity}}</td>
                    <td>{{@$values->amount}}</td>
                    <td>
                        {{@$values->total_amount}}
                        <!-- {{$values->food_orders->total_amount}} -->
                    </td>
                  </tr>
                  @endforeach
                  
                </tbody>
                
              </table>
              <!-- End Table Variants -->

            </div>
          </div>



@endsection          

