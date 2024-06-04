@extends('admin.layouts.sidebar')
@section('content')
    
<div class="pagetitle d-flex justify-content-between align-items-center">
          
    <!-- <div>
        <a href="{{route('admin.restaurants.addView')}}"><i class="ri-add-fill pe-1"></i>Order details</a>
    </div>           -->
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">
        <div class="col-12">

            <div class="card">
              <div class="card-body" style="overflow-x: auto">
                <h5 class="card-title">Order details</h5>
  
                <!-- Default Table -->
                <table class="table datatable table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Sl. No.</th>
                      <th scope="col">OrderId</th>
                      <th scope="col">Item</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Amount</th>                                                               
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($details as $key => $value)
                    <tr>
                      <th scope="row">{{$key+1}}</th>
                      <td>{{$value->restaurant_id}}</td>
                      <td>{{$value->item}}</td>
                      <td>{{$value->quantiry}}</td>
                      <td>{{$value->amount}}</td>                                                                
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- End Default Table Example -->
              </div>
            </div>
  
          </div>

        
      </div>
    </section>

 

  

  @endsection