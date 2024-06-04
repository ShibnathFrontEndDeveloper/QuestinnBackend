@include('inc.header')
<section class="payMentSec">
    <div class="container">
        <div class="col-md-12 mt-5 roomCustomer_details">
            <div class="card" style="width: 22rem;">
                <div class="d-flex justify-content-between align-items-center card-header">
                    <h5 class="">Due Now</h5>
                    <h5 class=""><i class="bi bi-currency-rupee"></i>{{@$request->sub_total}}</h5>
                </div>
              <div class="card-body d-flex align-items-center">
                  <img src="{{asset('public/storage/room/1687676966_7979.IMG_42663.png')}}" class="roomCustomer_detailsImg">
                  <div class="ms-3">
                      <p class="mb-0 fw-bold">Quest Inn Beach Resort</p>
                      <span class="text-secondary">{{@$request->check_in}} - {{@$request->check_out}}</span>
                  </div>
              </div>
              <div class="card-footer">
                  <p class="mb-0">{{@$request->name}}<span>+1</span> </p>
              </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="payMentDetailsBox">
                    <div class="payMentTdBox">
                        <div class="pTd">
                            <h4>Customer Name:<span>{{@$request->name}}</span></h4>
                        </div>
                        <div class="pTd">
                            <h4>Date:<span>{{now()->format('Y-m-d')}}</span></h4>
                        </div>
                    </div>
                    <div class="payMentScanBar_box mt-5">
                        <form class="d-flex flex-column align-items-center mb-3" action="{{route('room_booked_checkout')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <!--1)Payment By UPI-->
                                
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="flexRadioDefault" value="qr_code" id="flexRadioDefault1" > 
                                  <label class="form-check-label" for="flexRadioDefault1">
                                    <div class="scanStep_part">
                                        <div class="scanBoxImage">
                                            <h5>UPI QR Code</h5>
                                            <img src="{{asset('public/images/scaner.webp')}}" >
                                        </div>
                                        
                                        <div class="scanDetailsStep">
                                            <div class="stepTextBox">
                                                <h1>Step 1:</h1>
                                                <p>Scan QR code or copy the UPI ID to your Phonepay,Paytm,Gpay or any UPI App</p>
                                            </div>
                                            <div class="stepTextBox mt-5">
                                                <h1>Step 2:</h1>
                                                <p>Input the amount and process your pyment through selected app</p>
                                            </div>
                                            <div class="stepTextBox">
                                                <h1>Step 3:</h1>
                                                <p>Once payment done, Enter 12 digit UTR number and click submit button to confirm the payment.
                                                If you don't backfill UTR, 100% oif the deposit transaction will fail. Please be sure to backfill.</p>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                  </label>
                                </div>
                                
                                <div class="col-md-12">
                                    <input  class="form-control" name="transaction_id" placeholder="Enter your UTR/UPI Transaction ID/Challan/Reference Number">
                                    <span>(Copy from banking app-enter currect number)</span>
                                </div>
                               
                                
                                <div class="d-none">
                                    <input type="hidden" class="form-control" name="name" value="{{$request['name']}}">
                                    <input type="hidden" class="form-control" name="email" value="{{$request['email']}}">
                                    <input type="hidden" class="form-control" name="mobile" value="{{$request['mobile']}}">
                                    <input type="hidden" class="form-control" name="check_in" value="{{$request['check_in']}}">
                                    <input type="hidden" class="form-control" name="check_out" value="{{$request['check_out']}}">
                                    <input type="hidden" class="form-control" name="no_rooms" value="{{$request['no_rooms']}}">
                                    <input type="hidden" class="form-control" name="address" value="{{$request['address']}}">
                                    <input type="hidden" class="form-control" name="room_id" value="{{$request['room_id']}}">
                                    <input type="file" class="form-control" name="image" value="{{$request['image']}}">
                                </div>
                                <div class="mt-3 col-md-12">
                                    <input type="file" name="scrnshot" placeholder="Enter your payment screenshot" class="form-control">
                                    <span>(Enter your payment screenshot)</span>
                                </div>
                                
                                <span>OR</span>
                                
                                <!--2)Book Now Pay Later-->
                                
                                <div class="col-md-12">
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="flexRadioDefault" value="pay_later" id="flexRadioDefault2" checked>
                                      <label class="form-check-label" for="flexRadioDefault2">
                                        Book Now Pay Later
                                      </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn mt-4 order_btn">Submit</button>
                                
                                
                                
                                <!--Choose Payment Option-->
                                
                                
                                
                                
                                
                                
                                
                                
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the radio buttons
        const upiRadio = document.getElementById('flexRadioDefault1');
        const payLaterRadio = document.getElementById('flexRadioDefault2');
        // Get the input fields
        const transactionIdInput = document.querySelector('input[name="transaction_id"]');
        const imageInput = document.querySelector('input[name="scrnshot"]');

        // Function to add or remove the required attribute based on radio button selection
        function toggleRequired(attribute, element, required) {
            if (required) {
                element.setAttribute(attribute, true);
            } else {
                element.removeAttribute(attribute);
            }
        }

        // Event listener for UPI radio button
        upiRadio.addEventListener('change', function () {
            toggleRequired('required', transactionIdInput, true);
            toggleRequired('required', imageInput, true);
        });

        // Event listener for Pay Later radio button
        payLaterRadio.addEventListener('change', function () {
            toggleRequired('required', transactionIdInput, false);
            toggleRequired('required', imageInput, false);
        });
    });
</script>




































@include('inc.footer')