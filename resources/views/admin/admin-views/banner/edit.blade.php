
@extends('admin.layouts.sidebar')
@section('content')

<div class="content">
				<div class="page-inner">
					<form action="{{route('admin.banner.update',$edit->id)}}" method="POST" enctype="multipart/form-data">  
						{{ csrf_field() }}
					
					<div class="row">
						<div class="col-md-9">
							<div class="card">
								<div class="card-header">
									<a href="{{route('admin.banner.list')}}"><div class="card-title">Banner</div></a>
								</div>
								<div class="card-body">
									<div class="row">
									
										<div class="col-md-12">
											<div class="form-group">
												<label for="defaultSelect">Name</label>
												<input type="text" name="name" class="form-control" value="{{$edit->heading}}">
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<label for="defaultSelect">Banner Section</label>
												<input type="text" name="banner_section" class="form-control" value="{{$edit->section_name}}">
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<label for="defaultSelect">Banner</label>
												<input type="file" name="banner" class="form-control" value="{{$edit->banner}}">
												<img src="{{asset($edit->banner)}}" style="width:150px">
											</div>
										</div>

										

										<div class="col-md-12">
											<div class="form-group">
                                			<label><strong>Description :</strong></label>
                                				<textarea class="ckeditor form-control" required name="description">{{$edit->description}}</textarea>
                            				</div>
										</div>


									</div>
									<div>
									<div class="card-action">
										<button type="submit" class="btn btn-success">Update</button>
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