
@extends('admin.layouts.sidebar')
@section('content')

<div class="content">
				<div class="page-inner">
					<form action="{{route('admin.testimonial.add')}}" method="POST" enctype="multipart/form-data">  
						{{ csrf_field() }}
					
					<div class="row">
						<div class="col-md-9">
							<div class="card">
								<div class="card-header">
									<a href="{{route('admin.testimonial.list')}}"><div class="card-title">Testimonial</div></a>
								</div>
								<div class="card-body">
									<div class="row">
									
										<div class="col-md-12">
											<div class="form-group">
												<label for="defaultSelect">Name</label>
												<input type="text" name="name" class="form-control">
											</div>
										</div>
										
										<div class="col-md-12">
											<div class="form-group">
												<label for="defaultSelect">Image</label>
												<input type="file" name="image" class="form-control">
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<label for="defaultSelect">rating</label>
												<input type="number" name="rating" class="form-control">
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
                                			<label><strong>Description :</strong></label>
                                				<textarea class="ckeditor form-control" required name="description"></textarea>
                            				</div>
										</div>


									</div>
									<div>
									<div class="card-action">
										<button type="submit" class="btn btn-success">Submit</button>
									</div>
									</div>

								</div>
								

								
							</div>
						</div>



						
					</div>

					

					</form>

					</div>


				</div>
			</div>

		
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>

@endsection