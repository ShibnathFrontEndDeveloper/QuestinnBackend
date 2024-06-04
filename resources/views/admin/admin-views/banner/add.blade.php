
@extends('admin.layouts.sidebar')
@section('content')

<div class="content">
				<div class="page-inner">
					<form action="{{route('admin.banner.add')}}" method="POST" enctype="multipart/form-data">  
						{{ csrf_field() }}
					
					<div class="row">
						<div class="col-md-9">
							<div class="card">
								<div class="card-header">
									<!--<a href="{{route('admin.banner.list')}}" class="btn btn-primary"><div class="card-title">Banner</div></a>-->
									<a href="{{route('admin.banner.list')}}"><h5 class="btn btn-primary mt-4">Banner</h5></a>
								</div>
								<div class="card-body">
									<div class="row">
									
										<div class="col-md-12">
											<div class="form-group">
												<label for="defaultSelect">Heading</label>
												<input type="text" name="name" class="form-control" placeholder="enter heading">
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<label for="defaultSelect">Banner Section</label>
												<input type="text" name="banner_section" class="form-control" placeholder="enter section name">
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
                                			<label><strong>Upload Image :</strong></label>
                                				<input type="file" name="banner" multiple class="form-control" placeholder="upload image" required> 
                            				</div>
										</div>

										

										<div class="col-md-12">
											<div class="form-group">
                                			<label><strong>Description :</strong></label>
                                				<textarea class="ckeditor form-control" required name="description"></textarea>
                            				</div>
										</div>


									</div>
									
									<div class="text-center">
        								<button type="submit" class="btn btn-primary">Submit</button>
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