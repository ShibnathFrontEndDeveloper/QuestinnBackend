
@extends('admin.layouts.sidebar')
@section('content')


<div class="content">
     		<div class="page-inner">

     				<div class="row">
						<div class="col-md-12">
							<div class="card">
								<!-- <div class="card-header">
									<h4 class="card-title"></h4>
								</div> -->
								<!--<div class="card-header" style="float: right;">-->
								<!--	<a href="{{route('admin.banner.addView')}}"><h4 class="card-title">banner</h4></a>-->
								<!--</div>-->
								
								<div class="card-header">
								
									<a href="{{route('admin.galleries.addView')}}"><h5 class="btn btn-success mt-4">Add Gallery</h5></a>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Sl</th>
													<th>Image</th>													
													<th>video Url</th>													
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($list as $keys => $values)
												<tr>
													<td>{{$keys+1}}</td>
													<td><img src="{{asset($values->image)}}" style="width:150px"></td>													
													<td><iframe class="embed-responsive-item" src="{{$values->video_url}}" allowfullscreen></iframe></td>													
													<td>
													<a class="btn btn-danger btn-sm delete" style="cursor: pointer;"
                                                        href="{{route('admin.galleries.delete',$values->id)}}"><i class="fas fa-trash"></i>delete</a>
                                                       <a class="btn btn-primary btn-sm edit" style="cursor:pointer;"
                                                       href="{{route('admin.galleries.edit',$values->id)}}"><i class="fas fa-edit"></i>edit</a>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>

@endsection