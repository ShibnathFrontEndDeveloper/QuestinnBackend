
<footer class="footer_part" style="background:url({{asset('public/images/sand-coconut-sunrise-hotel-swimming.jpg')}});">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 p-4 footer_text logo_colnm">
				<a href="index.php"><img src="{{asset('public/images/questinn_logo_white.png')}}" alt="" class="footer_logo"></a>
				<p>Questinn eshtablished since 1989,25,12. It's a completely control by centrelize airconditioner restaurant</p>
				<div class="socisl_icon_box d-flex">
					<a href="https://www.youtube.com/@QuestInnBeachResort
" target="_blank"class="link_icon">
						<i class="bi bi-youtube"></i>
					</a> 
					<a href="https://www.facebook.com/questinnbeachresort" target="_blank"class="link_icon mx-1">
						<i class="bi bi-facebook"></i>
					</a>
					<a href="#" class="link_icon">
						<i class="bi bi-instagram"></i>
					</a> 
				</div>
			</div>
			<div class="col-lg-2 p-4 footer_text">
				<h5 class="mb-3">Quick Link</h5>
				<a href="{{route('about')}}" class="quick_links"><i class="bi bi-check"></i>About Us</a>
				<a href="{{route('facilities')}}" class="quick_links"><i class="bi bi-check"></i>Services</a>
				<a href="{{route('gallery')}}" class="quick_links"><i class="bi bi-check"></i>Gallery</a>
				<a href="{{route('contact_us')}}" class="quick_links"><i class="bi bi-check"></i>Contact</a>
			</div>
			<div class="col-lg-3 p-4 footer_text">
				<h5 class="mb-3">Working Hours</h5>
				<span><i class="bi bi-clock"></i>Check-in: 9am - 9:30am</span>
				<span><i class="bi bi-clock"></i>Check-out: 10am - 11am</span>
				<!--<span><i class="bi bi-clock"></i>Mon-Thr: 10am - 10pm</span>-->
			</div>
			<div class="col-lg-4 p-4 footer_text">
				<h5 class="mb-3">Get in touch</h5>
				<p><i class="bi bi-envelope"></i>info@questinn.in</p>
				<p><i class="bi bi-telephone"></i> +91-6296663434</p>
				<p><i class="bi bi-cursor"></i>Mandarmani Marine Drive Road, Dadanpatra, Mandarmani, West Bengal- 721455</p>
			</div>
		</div>
	</div>

</footer>
<div class="copy_right">
	<div class="container">
		<div class="row">
			<div class="col-6 copy_text">
				<p class=""><i class="bi bi-c-circle"></i>All copy rights reserved: Questinn</p>
			</div>
			<div class="col-6 copy_text_link">	
				<p class="text-right">Designed by: <a href="https://websolveinfo.com/" target="_blank">Websolveinfo</a></p>
			</div>
		</div>
	</div>
	
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<script src="{{asset('public/assets/js/toastr.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script>
    $(document).ready(function() {
        $('[data-fancybox="gallery"]').fancybox({
            buttons: [
                "zoom",
                "slideShow",
                "fullScreen",
                "download",
                "thumbs",
                "close"
            ],
            loop: true
        });
    });
</script>

<script>
	function inc_quantity(value,index,price){     
	    
	    
	   // console.log(value);
	   //console.log(index);
	   // console.log(price);
        var quantity = document.getElementById("food_cart_quantity" + index).value;
        console.log(quantity);
        if(quantity < 20){
          var new_quant = Number(value) +  Number(quantity);
          var amount = new_quant * price;
          
          document.getElementById("food_cart_quantity" + index).value = new_quant;
          document.getElementById("chosen_price" + index).innerText  ="₹ "+amount;
          document.getElementById("chosen_price1" + index).value  = "₹ "+amount;
        }
    }

	function dec_quantity(value,index,price){		
        var quant = document.getElementById("food_cart_quantity" + index).value;        
        if(quant > 1){
          var new_quant = Number(quant) -  Number(value);
          var amount = new_quant * price;
          console.log(amount);
          document.getElementById("food_cart_quantity" + index).value = new_quant;
          document.getElementById("chosen_price" + index).innerHTML  ="₹ "+amount;
          document.getElementById("chosen_price1" + index).value  ="₹ "+amount;
        }
    }
</script>

<script>
	function buy_now(product_id,index){	
	    
	    
		if(product_id == 'unauthenticate' && index == 0){
			Swal.fire(
				'Questinn!',
				'Sorry This Section Is only for booked customer!',
				'error'											
			)
		}
		addToCart(product_id,index);
	}
</script>

<script>
	function addToCart(product_id,index){
		let amount = document.getElementById("chosen_price1"+index).value;	
		let quantity = document.getElementById("food_cart_quantity"+index).value;
// 		console.log(amount);
// 		console.log(quantity);
		$.ajax({
          type:'POST',
          url:'{{route("add-to-cart-food")}}',
          data: {
              "_token": "{{ csrf_token() }}",              
              "amount"  : amount,
              "quantity"    : quantity,
              "product_id": product_id,              
              },          
              success:function(data){				
				if(data.msg == 0){
					Swal.fire(
						'Questinn!',
						'Product already in cart!',
						'info'											
					)
				}else if(data.msg == 'successfull') {
					location.reload();
				}             
                // toastr.success('Product added to cart'); 
				
            }
        });
		// console.log(data);		    		
	}
</script>

<script>
			function formDate(value){				
				let today = new Date();
				let date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+(today.getDate());								
				var current_date = Date.parse(date);
				let fromDate = Date.parse(value);
				if(fromDate < current_date){
					Swal.fire(
						'Questinn!',
						'Please ensure the date is later than current date!',
						'error'											
					)
					document.getElementById("from_date").value = '';
				}
				// let toDate = Date.parse(document.getElementsByName("to_date"));
			}

			function toDate(value){				
				let date = document.getElementById("from_date").value;	
				if(date){
					let fromDate = Date.parse(date);
					let toDate = Date.parse(value);
					if(toDate <= fromDate){
						Swal.fire(
							'Questinn!',
							'Please ensure the date is later than check-in date!',
							'error'											
						)
						document.getElementById("to_date").value = '';
					}
				}else {
					Swal.fire(
						'Questinn!',
						'Please ensure that check-in date is not empty!',
						'error'											
					)
					document.getElementById("to_date").value = '';
				}
				
			}

		function cartQuantity_change(key,value){
			$.ajax({
			type:'POST',
			url:'{{route("update_cart")}}',
			data: {
				"_token": "{{ csrf_token() }}",              								
				"product_id": key,     
				"quantity": value  ,       
				},          
				success:function(data){				
					if(data.msg == 0){
						Swal.fire(
							'Questinn!',
							'something went wrong!',
							'error'											
						)
					}else if(data.msg == 1) {
						location.reload();
					}             
					// toastr.success('Product added to cart'); 					
				}
			});
		}
		
		function remove_cart(id){			
			$.ajax({
			type:'POST',
			url:'{{route("remove_from_cart")}}',
			data: {
				"_token": "{{ csrf_token() }}",              								
				"product_id": id,              
				},          
				success:function(data){				
					if(data.msg == 0){
						Swal.fire(
							'Questinn!',
							'something went wrong!',
							'error'											
						)
					}else if(data.msg == 1) {
						location.reload();
					}             
					// toastr.success('Product added to cart'); 
					
				}
			});
		}

		function food_order(user_id){

			let roomNo = document.getElementById("hiidenRoomNo").value;
			
				$.ajax({
				type:'POST',
				url:'{{route("food_order")}}',
				data: {
					"_token": "{{ csrf_token() }}",  
					"room_no": roomNo,            												              
					},          
					success:function(data){				
						if(data.msg == 0){
							Swal.fire(
								'Questinn!',
								'something went wrong!',
								'error'											
							)
						}else if(data.msg == 1) {
							location.href = "{{url('/')}}";
						}           
						// toastr.success('Product added to cart'); 
						
					}
				});
			
			
		}

		function sendMail(){
			let email = document.getElementById("fp_mail").value;
			$.ajax({
				type:'POST',
				url:'{{route("send_forget_mail")}}',
				data: {
					"_token": "{{ csrf_token() }}",  
					"email":email       												              
					},          
					success:function(data){	
						if(data.status == 1){
							$('#exampleModal').modal('hide');
							$('#exampleModalOtp').modal('show');
							// $('#exampleModalOtpLabel').empty();
						}else {
							'something went wrong';
						}																	
					}
				});
		}

		function sendOtp(){
			let otp = document.getElementById("fp_otp").value;
			$.ajax({
				type:'POST',
				url:'{{route("check_otp")}}',
				data: {
					"_token": "{{ csrf_token() }}",  
					"otp":otp       												              
					},          
					success:function(data){	
						if(data.status == 1){
							$('#exampleModalOtp').modal('hide');
							$('#exampleResetPassword').modal('show');							
						}else {
							'something went wrong';
						}																		
					}
			});
		}

		function reset_password(){
			let password = document.getElementById("new_password").value;
			$.ajax({
				type:'POST',
				url:'{{route("reset_password")}}',
				data: {
					"_token": "{{ csrf_token() }}",  
					"password":password       												              
					},          
					success:function(data){							
						if(data.status == 1){							
							Swal.fire(
							'Questinn!',
							'Password reset successfully!',
							'success'											
						)
						location.reload();
							// $('#exampleModalOtpLabel').empty();
						}else {
							'something went wrong';
						}																		
					}
			});
		}

</script>