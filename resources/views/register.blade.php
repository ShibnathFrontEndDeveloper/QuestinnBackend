@include('inc.header')
<div class="log_section" style="background:url(public/images/log_bg.jpg)">
    <div class="logForm_box_main">
        <form action="{{route('register')}}" method="POST" class="logSign_form" enctype="multipart/form-data">
            @csrf
            <div class="logo_box">
                <a href="index.php"><img src="{{asset('public/images/questinn_logo_white.png')}}" alt="" srcset="" class="img-fluid"></a>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" required placeholder="Name" value="{{ old('name') }}" name="name">
                        @if($errors->has('name'))
                            <div><span class="text-danger">{{ $errors->first('name') }}</span></div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" required placeholder="Your Email" value="{{ old('email') }}" name="email">
                        @if ($errors->has('email'))
                            <div><span class="text-danger">{{ $errors->first('email') }}</span></div>
                        @endif
                    </div>
                </div>
                <!--<div class="col-md-6">-->
                <!--    <div class="form-group mb-3">-->
                <!--        <label for="" class="form-label">ID</label>-->
                <!--        <select name="id_name" id="" class="form-select">-->
                <!--            <option value="pan_card" select>Pan Card</option>-->
                <!--            <option value="aadhar_card">Aadhaar Card</option>-->
                <!--            <option value="voter_card">Voter Card</option>-->
                <!--            <option value="driving_license">Driving Licence</option>-->
                <!--        </select>-->
                <!--        @if ($errors->has('id_name'))-->
                <!--            <div><span class="text-danger">{{ $errors->first('email') }}</span></div>-->
                <!--        @endif-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="col-md-6">-->
                <!--    <div class="form-group mb-3">-->
                <!--        <label for="" class="form-label">ID Photo</label>-->
                <!--        <input type="file" class="form-control" name="image">                        -->
                <!--        @if ($errors->has('image'))-->
                <!--            <div><span class="text-danger">{{ $errors->first('name') }}</span></div>-->
                <!--        @endif-->
                <!--    </div>-->
                <!--</div>-->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Mobile</label>
                        <input type="tel" class="form-control" required  placeholder="Mobile" value="{{ old('phone_number') }}"  name="phone_number">
                        @if ($errors->has('phone_number'))
                            <div><span class="text-danger">{{ $errors->first('name') }}</span></div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Address</label>
                        <input type="text" class="form-control" required placeholder="Address" value="{{ old('address') }}" name="address">
                        @if ($errors->has('address'))
                            <div><span class="text-danger">{{ $errors->first('name') }}</span></div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" required placeholder="Password" value="{{ old('password') }}" name="password">
                        @if ($errors->has('password'))
                            <div><span class="text-danger">{{ $errors->first('name') }}</span></div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" required placeholder="Password" value="{{ old('confirm_password') }}" name="confirm_password">
                        @if ($errors->has('password_confirmation'))
                            <div><span class="text-danger">{{ $errors->first('name') }}</span></div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <p class="form_para">Alrerady have an account? <a href="{{route('loginview')}}">Login</a></p>
            </div>
            <div class="form-group mb-3">
                <button type="submit" class="register_btn">Confirm & Continue</button>
            </div>

        </form>
    </div>
</div>

@include('inc.footer')