
@extends('admin.layouts.sidebar')
@section('content')

<div class="card">
    <div class="card-body">
        <a href="{{route('admin.categories.list')}}"><h5 class="btn btn-success mt-4">Category</h5></a>

      <!-- Floating Labels Form -->
      <form class="row g-3" action="{{route('admin.categories.add')}}" method="POST">
        @csrf

        <div class="col-12">
            <label for="inputNanme4" class="form-label"><strong>Name</strong></label>
            <input type="text" name="name" class="form-control" placeholder="enter name">
        </div>
        

        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form><!-- End floating Labels Form -->

    </div>
  </div>

  @endsection