@extends('auth.layouts.app')
@section('content')
<!-- sign up section start  -->
<section class="sign_up_sec">
   <div class="container-fluid">
       <div class="row">
           <div class="col-lg-6 col-md-6">
               <div class="row left_bg justify-content-center">
                   <div class="col-lg-7 col-md-9">
                   <div class="sign_up_frm">
                       <a href="https://coinpilot.com"><img  src="{{ asset('assets-main/images/logo.png') }}" alt="logo" class="img-fluid"></a>
                       <br><br>
                       <h4>Welcome Back</h4>
                       <p>Log In to your account <br> and see your earnings</p>

                       @if (session('status'))
                           <div class="alert alert-success">
                               {{ session('status') }}
                           </div>
                       @endif

                       <form class="sign_frm" method="POST" action="{{ route('login') }}">
                           @csrf
                           <div class="form-group">
                              <label for="">Email Address</label>
                               <input type="text" name="email" class="form-control" placeholder="Enter Email Address">
                           </div>
                           <div class="form-group">
                              <label for="">Password</label>

                               <input id="password-field" type="password" class="form-control" name="password"  placeholder="Enter Password">
                               <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password "></span>

                           </div>

                           <div class="form-group">
                              <button type="submit" class="btn btn_sign">Log In</button>

                              <a href="{{ route('password.request') }}">Forgot Password?</a>
                              <div class="clearfix"></div>
                           </div>
                           <div class="hav_acnt"><span>Don't have an account? <a href="{{ route('register') }}">Sign Up </a></span></div>
                       </form>
                   </div>
                   <div class="signup_ftr">
                       <ul>
                           <li><a href="https://www.instagram.com/coinpilot/"><i class="fa fa-instagram"></i></a></li>
                           <li><a href="https://github.com/coinpilot"><i class="fa fa-github"></i></a></li>
                           <li><a href="https://twitter.com/coinpilot1"><i class="fa fa-twitter"></i></a></li>
                           <li><a href="https://discord.gg/ftvaDxYRwb"><i class="fab fa-discord"></i></a></li>
                       </ul>
                   </div>
               </div>
               </div>
           </div>
           <div class="col-lg-6 mobile_hide col-md-6">
               <div class="sign_up_img">
                   <div class="img_head_logo">
                    <a href="https://coinpilot.com">  <img src="{{ asset('assets-main/images/logo-small.png') }}" alt="logo" class="img-fluid"></a>
                   </div>
                   <div class="img_bdy">
                       <img src="{{ asset('assets-main/images/login.png') }}" alt="img" class="img-fluid">
                   </div>
                   <div class="img_ftr">
                    <ul>
                        <li ><a href="https://coinpilot.com">Terms &amp; Conditions</a></li>
                        <li ><a href=""><i class="fa fa-circle"></i></a></li>
                        <li ><a href="https://coinpilot.com">Privacy Policy</a></li>
                    </ul>
                </div>
               </div>
           </div>
       </div>
   </div>
</section>
<!-- sign up section end  -->
@endsection
