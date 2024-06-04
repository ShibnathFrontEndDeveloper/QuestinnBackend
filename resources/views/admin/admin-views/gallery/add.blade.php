
@extends('admin.layouts.sidebar')
@section('content')

<div class="content">
				<div class="page-inner">
					<form action="{{route('admin.galleries.add')}}" method="POST" enctype="multipart/form-data">  
						{{ csrf_field() }}
					
					<div class="row">
						<div class="col-md-9">
							<div class="card">
								<div class="card-header">
									<a href="{{route('admin.galleries.list')}}"><h5 class="btn btn-primary mt-4">Gallery</h5></a>
								</div>
								<div class="card-body">
									<div class="row">
									
										<div class="col-md-12">
											<div class="form-group">
                                			<label><strong>Image :</strong></label>
                                				<input type="file" name="image" class="form-control" placeholder="upload image" required> 
                            				</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<label for="defaultSelect">Video Url</label>
												<input type="text" name="video" class="form-control" placeholder="enter video url">
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

		
@endsection