@include('inc.header')
<div class="log_section" style="background:url(public/images/sand-coconut-sunrise-hotel-swimming.jpg)">
    <div class="logForm_box_main">
        
            <form action="{{route('login')}}" method="POST" class="logSign_form">
                @csrf
                <div class="logo_box">
                    <a href="{{route('index')}}"><img src="{{asset('public/images/questinn_logo_white.png')}}" alt="" srcset="" class="img-fluid"></a>
                </div>
                <!-- <div class="form-group mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" required placeholder="Name">
                </div> -->
                <div class="form-group mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control" required placeholder="Your Email" name="email">
                    @if ($errors->has('email'))
                        <div><span class="text-danger">{{ $errors->first('email') }}</span></div>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control" required placeholder="Password" name="password">
                    @if ($errors->has('password'))
                        <div><span class="text-danger">{{ $errors->first('password') }}</span></div>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <p class="form_para">Don't you have an account? <a href="{{route('register_view')}}">Signup</a> <a href="#modal"  class="ms-5" data-bs-toggle="modal" data-bs-target="#exampleModal">Forgot Password?</a></p>
                </div>
                <div class="form-group mb-3 text-align-center">
                    <button type="submit" class="register_btn">Login</button>
                </div>
            </form>
        
    </div>
    
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header forgot_modal_header">
                <h5 class="modal-title" id="exampleModalLabel">Reset Your Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="email" class="form-label">Enter Your Mail</label>
                        <input type="email" name="email" id="fp_mail" placeholder="Your Email" class="form-control">
                    </div>
                    <div class="my-5">
                    <button type="button" class="btn btn-secondary" onclick="sendMail()">Send</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModalOtp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header forgot_modal_header">
                <h5 class="modal-title" id="exampleModalOtpLabel">Reset Your Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="email" class="form-label">Enter Your otp</label>
                        <input type="email" name="email" id="fp_otp" placeholder="Your otp" class="form-control">
                    </div>
                    <div class="my-5">
                    <button type="button" class="btn btn-secondary" onclick="sendOtp()">Send</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleResetPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header forgot_modal_header">
                <h5 class="modal-title" id="exampleModalLabel">Reset Your Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="email" class="form-label">New Password</label>
                        <input type="text" name="new_password" id="new_password" placeholder="Your password" class="form-control">
                    </div>
                    <div class="my-5">
                    <button type="button" class="btn btn-secondary" onclick="reset_password()">Save</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

</div>

@include('inc.footer')