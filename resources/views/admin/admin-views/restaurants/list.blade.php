@extends('admin.layouts.sidebar')
@section('content')
    
<div class="pagetitle d-flex justify-content-between align-items-center">
          
    <div>
        <a href="{{route('admin.restaurants.addView')}}" type="button" class="btn btn-primary my-auto"><i class="ri-add-fill pe-1"></i>Make Order</a>
    </div>          
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">
        <div class="col-12">

            <div class="card">
              <div class="card-body" style="overflow-x: auto">
                <h5 class="card-title"></h5>
  
                <!-- Default Table -->
                <table class="table datatable table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Sl. No.</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Address</th>                                         
                      <th scope="col">Total Amount</th>                                                                
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($restaurants as $key => $value)
                    <tr>
                      <th scope="row">{{$key+1}}</th>
                      <td>{{$value->name}}</td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->phone}}</td>
                      <td>{{$value->address}}</td>
                      <td>{{$value->address}}</td>
                      <td>{{$value->total_amount}}</td>                      
                      <td >
                      <a href="{{route('admin.restaurants.view',$value->id)}}"><span class="badge bg-primary">View</span></a>
                    </td>
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