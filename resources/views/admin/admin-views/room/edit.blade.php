
@extends('admin.layouts.sidebar')
@section('content')




<div class="content">
				<div class="page-inner">
					<form action="{{route('admin.rooms.update',$edit->id)}}" method="POST" enctype="multipart/form-data">  
						{{ csrf_field() }}
					
					<div class="row">
						<div class="col-md-9">
							<div class="card">
								<div class="card-header">
									<a href="{{route('admin.rooms.list')}}"><div class="card-title">Rooms</div></a>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="defaultSelect">Title</label>
												<input type="text" name="title" class="form-control" value="{{$edit->title}}" required> 
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<label for="defaultSelect">Price</label>
												<input type="number" name="price" class="form-control" value="{{$edit->price}}" required> 
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
                                			<label><strong>Description :</strong></label>
                                				<textarea class="ckeditor form-control" required name="description">{{$edit->description}}</textarea>
                            				</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
                                			<label><strong>Upload Room Images:</strong></label>
                                				<input type="file" name="image[]" multiple class="form-control" placeholder="upload image"> 
                            				</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
                                			<label><strong>Number Of Bed</strong></label>
                                				<input type="text" name="bedroom" class="form-control" value="{{$edit->number_of_bed}}" required> 
                            				</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
                                			<label><strong>Number Of Bathroom</strong></label>
                                				<input type="text" name="bathroom" class="form-control" value="{{$edit->number_of_bathroom}}" required> 
                            				</div>
										</div>
						
										<div class="col-md-3">
											<div class="form-group">
                                			<label><strong>No of Rooms</strong></label>
                                				<input type="number" name="room_no" class="form-control" value="{{$edit->room_quantity}}" required> 
                            				</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
                                			<label><strong>Balcony</strong></label>											
                                			<select name="is_balcony" class="form-control" required>                                				
                                				<option value="1" @selected($edit->is_balcony == '1')>Yes</option>
                                				<option value="0" @selected($edit->is_balcony == '0')>No</option>                                				
                                			</select> 
                            				</div>
										</div>
										
										
										<!-- <div class="col-md-12">
											<div class="form-group">
                                			<label><strong>Room Video</strong></label>
                                				<input type="file" name="video" class="form-control" value="{{$edit->room_video}}" > 
												<video src="{{asset('public/storage/room/'.$edit->room_video)}}" style="width:150px"></video>
											</div>
										</div> -->
									</div>
								</div>

								<!-- <div class="card-action">
									<button type="button" onclick="submitSlot()" class="btn btn-success">Submit</button>
								</div> -->
							</div>
						</div>



						<div class="col-md-3">
							<div class="row">
								<div class="col-12">
									<div class="card">
								<div class="card-header">
									<div class="card-title">Categories</div>
								</div>


							<div class="card-body">
									<div class="row">
										@foreach($categories as $cate_keys => $cate_values)
										<div class="col-md-12 ">
											<div class="form-check" >
                                				<input type="radio" name="category" value="{{$cate_values->id}}" @checked($edit->categories == $cate_values->id) class="form-check-input" required>
                                			<label for="html">{{$cate_values->name}}</label>
                            				</div>
										</div>
										@endforeach
										<!-- <div class="col-md-12 ">
											<div class="form-check" >
                                			<label class="form-check-label">
                                				<input type="checkbox" name="categories2" class="form-check-input"><span class="form-check-sign">Vila</span>
                                			</label>
                            				</div>
										</div> -->

										<!-- <div class="col-md-12 ">
											<div class="form-check" >
                                			<label class="form-check-label">
                                				<input type="checkbox" name="categories3" class="form-check-input"><span class="form-check-sign">Cottage</span>
                                			</label>
                            				</div>
										</div> -->

										<!-- <div class="col-md-12 ">
											<div class="form-check" >
                                			<label class="form-check-label">
                                				<input type="checkbox" name="categories4" class="form-check-input"><span class="form-check-sign">Commercial Property</span>
                                			</label>
                            				</div>
										</div> -->

									</div>
								</div>

								</div>
								</div>


								<!-- <div class="col-12">
									<div class="card">
								<div class="card-header">
									<div class="card-title">Status</div>
								</div>


							<div class="card-body">
									<div class="row">
										<div class="col-md-12 ">
											<div class="form-check" >
                                			<label class="form-check-label">Status</label>
                                			<select name="status" class="form-control" required>
                                				<option value="">Select</option>
                                				<option value="Not Available">Not Available</option>
                                				<option value="Selling">Selling</option>
                                				<option value="Sold">Sold</option>
                                			</select>	
                            				</div>
										</div>

									</div>
								</div>

								</div>
								</div> -->


								<div class="col-12">
									<div class="card">
								<div class="card-header">
									<div class="card-title">Publish</div>
								</div>


							<div class="card-body">
									<div class="row">
										<div class="col-md-12 ">
											<div class="form-group" >
                                			<button type="submit" class="btn btn-success">Update</button>
                            				</div>
										</div>

									</div>
								</div>

								</div>
								</div>

							</div>
							
						</div>

					</div>

					<div class="row">
						<div class="col-md-9">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Guests</div>
								</div>


							<div class="card-body">
									<div class="row">
									<div class="col-md-6">
											<div class="form-group">
                                			<label><strong>Adults</strong></label>
                                				<input type="number" name="adults" class="form-control" value="{{$edit->adults}}" required> 
                            				</div>
										</div>
									<div class="col-md-6">
										<div class="form-group">
										<label><strong>Childrens</strong></label>
											<input type="number" name="chirdrens" class="form-control" value="{{$edit->childrens}}" required> 
										</div>
									</div>
									</div>
								</div>

								</div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-9">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Facilities</div>
								</div>


							<div class="card-body">
									<div class="row">
										@foreach($facilities as $keys => $values)
										<div class="col-md-3 ">
											@php
												$dbFeature = json_decode($edit->facilities,true);
											@endphp
											<div class="form-check" >
                                			<label class="form-check-label">
                                				<input type="checkbox" name="features[]" value="{{$values->name}}" <?php foreach($dbFeature as $dbKey => $dbValue){if($dbValue == $values->name){echo 'checked';}else {echo '';}} ?> class="form-check-input"><span class="form-check-sign">{{$values->name}}</span>
                                			</label>
                            				</div>
										</div>
										@endforeach
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