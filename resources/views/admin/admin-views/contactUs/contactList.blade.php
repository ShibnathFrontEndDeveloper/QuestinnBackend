

@extends('admin.layouts.sidebar')
@section('content')

<div class="content">
     		<div class="page-inner">

     				<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">									
									<!-- <a href="{{route('admin.rooms.addView')}}"><h5 class="btn btn-success mt-4">Add Room</h5></a> -->
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Sl</th>
													<th>Name</th>
													<th>Email</th>
													<th>Subject</th>												
													<th>Message</th>													
												</tr>
											</thead>
											<tbody>
												@foreach($list as $keys => $values)
												<tr>
													<td>{{$keys+1}}</td>
													<td>{{$values->name}}</td>
													<td>{{$values->email}}</td>
													<td>{{$values->subject}}</td>
													<td>{{$values->message}}</td>
													<!-- <td>
													<a class="btn btn-danger btn-sm delete" style="cursor: pointer;"
                                                        href="{{route('admin.rooms.delete',$values->id)}}"><i class="fas fa-trash"></i>delete</a>
                                                       <a class="btn btn-primary btn-sm edit" style="cursor:pointer;"
                                                       href="{{route('admin.rooms.edit',$values->id)}}"><i class="fas fa-edit"></i>edit</a>
													</td> -->
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