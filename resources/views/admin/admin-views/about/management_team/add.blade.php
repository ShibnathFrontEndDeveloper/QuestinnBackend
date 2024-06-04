
@extends('admin.layouts.sidebar')
@section('content')

<div class="card">
    <div class="card-body">
        <a href="{{route('admin.about.management_team.list')}}"><h5 class="card-title">Management Team</h5></a>

      <!-- Floating Labels Form -->
      <form class="row g-3" action="{{route('admin.about.management_team.add')}}" method="POST" enctype="multipart/form-data">
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
            <label for="inputNanme4" class="form-label"><strong>Name</strong></label>
            <input type="text" name="name" class="form-control" id="inputNanme4" placeholder="Enter name" required>
        </div>

		<div class="col-12">
            <label for="inputNanme4" class="form-label"><strong>Image</strong></label>
            <input type="file" name="img" class="form-control" id="inputNanme4"  value="" >			
        </div>
				                 
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Save</button>
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



