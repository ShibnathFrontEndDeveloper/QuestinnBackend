
@extends('admin.layouts.sidebar')
@section('content')

<div class="card">
    <div class="card-body">
        <a href=""><h5 class="card-title">Contact Details</h5></a>

      <!-- Floating Labels Form -->
      <form class="row g-3" action="{{route('admin.contact_us.details.update')}}" method="POST">
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
            <input type="text" name="title" class="form-control" id="inputNanme4" value="{{$sql->title}}" required>
        </div>


        <div class="col-12">
            <label for="inputNanme4" class="form-label"><strong>Address</strong></label>
            <input type="text" name="address" class="form-control" id="inputNanme4" value="{{$sql->address}}" required>
        </div>

		<div class="col-12">
            <label for="inputNanme4" class="form-label"><strong>Email</strong></label>
            <input type="email" name="email" class="form-control" id="inputNanme4" value="{{$sql->email}}" required>
        </div>

		<div class="col-12">
            <label for="inputNanme4" class="form-label"><strong>Phone number</strong></label>
            <input type="number" name="phone" class="form-control" id="inputNanme4" value="{{$sql->phone}}" required>
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



