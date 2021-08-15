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
                       <h4>Welcome</h4>
                       <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?<br>If you didn't receive the email, we will gladly send you another.</p>

                       @if (session('status') == 'verification-link-sent')
                           <div class="alert alert-success">
                               {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                           </div>
                       @endif

                       <form class="sign_frm" method="POST" action="{{ route('verification.send') }}">
                           @csrf
                           <div class="form-group">
                              <button type="submit" class="btn btn_sign">Resend Verification Email</button>

                              <div class="clearfix"></div>
                           </div>
                       </form>
                       <div class="mx-auto mb-3" style="display: inline-block;">
                           <form class="sign_frm" method="POST" action="{{ route('logout') }}">
                               @csrf
                               <button type="submit" class="btn btn-sm btn-warning">
                                   {{ __('Log Out') }}
                               </button>
                           </form>
                       </div>
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
                       <img src="{{ asset('assets-main/images/signup.png') }}" alt="img" class="img-fluid">
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
