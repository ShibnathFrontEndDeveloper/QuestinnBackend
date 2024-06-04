
@extends('admin.layouts.sidebar')
@section('content')

<div class="content">
				<div class="page-inner">
					<form action="{{route('admin.galleries.update',$edit->id)}}" method="POST" enctype="multipart/form-data">  
						{{ csrf_field() }}
					
					<div class="row">
						<div class="col-md-9">
							<div class="card">
								<div class="card-header">
									<a href="{{route('admin.galleries.list')}}"><div class="card-title">Banner</div></a>
								</div>
								<div class="card-body">
									<div class="row">
									
										<div class="col-md-12">
											<div class="form-group">
												<label for="defaultSelect">Banner</label>
												<input type="file" name="image" class="form-control" value="{{$edit->image}}">
												<img src="{{asset($edit->image)}}" style="width:150px">
											</div>
										</div>

										

									<div class="col-md-12">
											<div class="form-group">
												<label for="defaultSelect">Video Url</label>
												<input type="text" name="video" class="form-control" value={{$edit->video_url}}>
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

@endsection