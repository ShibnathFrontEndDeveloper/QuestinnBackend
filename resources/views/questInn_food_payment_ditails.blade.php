@include('inc.header')
<section class="payMentSec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="payMentDetailsBox">
                    <div class="payMentTdBox">
                        <div class="pTd">
                            <h4>OrderID:<span>123456789</span></h4>
                        </div>
                        <div class="pTd">
                            <h4>Date:<span>23/06/2025</span></h4>
                        </div>
                    </div>
                    <div class="payMentScanBar_box mt-5">
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
                            </div>
                        </div>
                        <div class="stepTextBox">
                            <h1>Step 3:</h1>
                            <p>Once payment done, Enter 12 digit UTR number and click submit button to confirm the payment.
                            If you don't backfill UTR, 100% oif the deposit transaction will fail. Please be sure to backfill.</p>

                            <form class="d-flex align-items-center mb-3" action="{{route('food_payment_online')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <input required class="form-control" name="transaction_id" placeholder="Enter your UTR/UPI Transaction ID/Challan/Reference Number">
                                
                                <div>
                                @if($errors->has('transaction_id'))
                                    <div><span class="text-danger">{{ $errors->first('transaction_id') }}</span></div>
                                @endif
                                </div>
                                <input type="hidden" name="room_no" id="hiidenRoomNo" value="{{$room_no}}">                            

                                
                                <button type="submit" class="btn">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




































@include('inc.footer')