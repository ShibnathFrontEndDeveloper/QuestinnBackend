
@extends('admin.layouts.sidebar')
@section('content')

<div class="card">
    <div class="card-body">
        <a href=""><h5 class="card-title">About</h5></a>

      <!-- Floating Labels Form -->
      <form class="row g-3" action="{{route('admin.about.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
		@if (count($errors) > 0)
    	<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
    	</div>
		@endif
        <div class="col-12">
            <label for="inputNanme4" class="form-label"><strong>Title</strong></label>
            <input type="text" name="title" class="form-control" id="inputNanme4" value="{{$edit->title}}" required>
        </div>


        <div class="col-12">
            <label for="inputNanme4" class="form-label"><strong>Heading</strong></label>
            <input type="text" name="heading" class="form-control" id="inputNanme4" value="{{$edit->heading}}" required>
        </div>

		<div class="col-12">
            <label for="inputNanme4" class="form-label"><strong>Image</strong></label>
            <input type="file" name="img" class="form-control" id="inputNanme4"  value="" >
			<img src="{{asset('public/storage/about/'.$edit->image)}}" width="120px">
        </div>

		<div class="col-md-12" >
        	<label><strong>Description</strong></label>
        	<textarea class="form-control" name="description" id="editor">{!!$edit->description!!}</textarea>
      	</div>

		<div class="col-6">
            <label for="inputNanme4" class="form-label"><strong>Rooms</strong></label>
            <input type="number" name="rooms_no" class="form-control" id="inputNanme4" value="{{$edit->room_no}}" required>
        </div>

        <div class="col-6">
            <label for="inputNanme4" class="form-label"><strong>Rooms Icon</strong></label>
            <input type="file" name="rooms_icon" class="form-control" id="inputNanme4" value="">
            <img src="{{asset('public/storage/about/'.$edit->rooms_icon)}}" width="120px">
        </div>

		<div class="col-6">
            <label for="inputNanme4" class="form-label"><strong>Customers</strong></label>
            <input type="number" name="customers_no" class="form-control" id="inputNanme4" value="{{$edit->customer_no}}" required>
        </div>

        <div class="col-6">
            <label for="inputNanme4" class="form-label"><strong>Customers Icon</strong></label>
            <input type="file" name="customers_icon" class="form-control" id="inputNanme4" value="" >
            <img src="{{asset('public/storage/about/'.$edit->customers_icon)}}" width="120px">
        </div>

		<div class="col-6">
            <label for="inputNanme4" class="form-label"><strong>Reviews</strong></label>
            <input type="number" name="reviews_no" class="form-control" id="inputNanme4" value="{{$edit->review_no}}" required>
        </div>

        <div class="col-6">
            <label for="inputNanme4" class="form-label"><strong>Reviews Icon</strong></label>
            <input type="file" name="reviews_icon" class="form-control" id="inputNanme4" value="">
            <img src="{{asset('public/storage/about/'.$edit->reviews_icon)}}" width="120px">
        </div>

		<div class="col-6">
            <label for="inputNanme4" class="form-label"><strong>Staffs</strong></label>
            <input type="number" name="staffs_no" class="form-control" id="inputNanme4" value="{{$edit->staff_no}}" required>
        </div>

        <div class="col-6">
            <label for="inputNanme4" class="form-label"><strong>Staffs Icon</strong></label>
            <input type="file" name="staffs_icon" class="form-control" id="inputNanme4" value="" required>
            <img src="{{asset('public/storage/about/'.$edit->staffs_icon)}}" width="120px">
        </div>
		                 
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Update</button>
          <button type="reset" class="btn btn-secondary">Back</button>
        </div>
      </form><!-- End floating Labels Form -->

    </div>
  </div>

<script src="/cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>

@endsection



