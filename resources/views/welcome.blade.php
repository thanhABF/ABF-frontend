<!DOCTYPE html>
<html lang="en">
   <head>
   <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="acff7d4d-baaf-4b99-99ba-4b3f694f19fd";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="description" content="Crypto trading, the easy way." />
      <link href="{{ asset('assets-welcome/images/favicon.svg') }}" rel="shortcut icon" type="image/x-icon" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
      <link href="{{ asset('assets-welcome/css/style.css') }}" rel="stylesheet" />
      <link href="{{ asset('assets-welcome/css/animate.css') }}" rel="stylesheet" />
      <title>Coinpilot</title>
      <meta name="robots">
      <meta name="twitter:title" content="Coinpilot" />
      <meta name="twitter:description" content="Crypto trading, the easy way." />
      <meta name="twitter:image" content="https://i.imgur.com/A3fd2Aq.png" />
      <meta name="twitter:site" content="@Coinpilot1" />
      <meta property="image" content="https://i.imgur.com/A3fd2Aq.png" />
      <meta name="keywords" content="e-commerce, payment processing, digital products, digital shop, payments" />
      <meta property="og:site_name" content="Coinpilot" />
      <meta property="og:image" content="https://i.imgur.com/A3fd2Aq.png" />
      <meta property="og:type" content="website" />
      <meta property="og:url" content="https://coinpilot.com/" />
      <meta property="og:title" content="Coinpilot" />
      <meta property="og:description" content="Crypto trading, the easy way." />
      <style type="text/css">.c1-ui-state-hover {background-color:yellow !important; padding:5px !important }
      </style>
   </head>
   <body>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-xl bg-nav pt-xl-5">
         <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}"><img alt="logo" class="logo pt-2" src="{{ asset('assets-welcome/images/logo.svg') }}" /> </a>
            <button class="mt-2 navbar-toggler" data-target="#navbar" data-toggle="collapse" type="button"><i class="fas fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbar">
               <!--  -->
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item pt-2"><a class="nav-link text-white text-center" href="#features">About Us</a></li>
                  <li class="nav-item pt-2"><a class="nav-link text-white text-center" href="#results">Results</a></li>
                  <li class="nav-item pt-2"><a class="nav-link  text-white text-center" href="https://discord.gg/ftvaDxYRwb" target="_blank">Discord</a></li>
                  <li class="nav-item pt-2"><a class="nav-link  text-white text-center" href="#support">Support</a></li>
               </ul>
               <!--  -->
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item mx-auto pt-2"><a class="nav-link text-center started-navbar" href="{{ route('register') }}">Get Started</a></li>
                  <li class="nav-item text-none mx-auto pt-2"><a class="nav-link text-center text-none login-navbar" href="{{ route('login') }}">Log In</a></li>
               </ul>
               <!--  -->
            </div>
         </div>
      </nav>
      <!-- Navbar End --><!--    /////header content starts here////////////-->
      <section class="pt-5 align-items-center" id="top-header">
         <div class="container">
            <div class="py-4 d-none d-lg-block"></div>
            <div class="row align-items-center">
               <div class="col-md-6 wow fadeInUp" data-wow-delay=".5s">
                  <h1 class="text-white">Crypto trading, the easy way.</h1>
                  <p class="p1 text-white ">Automated crypto trading allowing the market to be more accessible to the average person.</p>
                  <a class="btn get-started" href="{{ route('register') }}">Get Started</a>
               </div>
               <div class="col-md-6 pt-2 wow fadeInUp" data-wow-delay=".5s"><img class="img-fluid" src="{{ asset('assets-welcome/images/img-top.svg') }}" /></div>
            </div>
         </div>
      </section>
      <section class="pt-3 pb-3 pt-md-5 pb-md-5 pad-section ">
         <div class="container">
            <h2 class="text-center p-color medium wow fadeInUp" data-wow-delay=".5s" id="features">About Us</h2>
            <p class="p1 p-color text-center opac p-3 wow fadeInUp" data-wow-delay=".5s">Cryptocurrency is the future; but it can be very intimidating for newcomers. Our goal is providing a user-friendly experience aimed for&nbsp;anyone seeking&nbsp;to take advantage of&nbsp;the future for&nbsp;cryptocurrency, from first timers, to experts.</p>
            <div class="row pt-2 pt-md-4 pb-0 pb-md-4">
               <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                  <div class="row">
                     <div class="col-4"><img class="img-fluid" src="{{ asset('assets-welcome/images/icon-1.svg') }}" /></div>
                     <div class="col-8">
                        <h5 class="card-p2 p-color medium bold">Your security is our priority</h5>
                        <p class="card-p2 opac medium p-color">We keep your information and investments safe. We store API keys that only have the ability to place trades. Funds are safe in your chosen exchange, as withdrawing is not enabled.</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                  <div class="row">
                     <div class="col-4"><img class="img-fluid" src="{{ asset('assets-welcome/images/icon-2.svg') }}" /></div>
                     <div class="col-8">
                        <h5 class="card-p2 medium p-color bold">We are here for you</h5>
                        <p class="card-p2 medium opac p-color">We are available 24/7 to answer any questions you may have;&nbsp;primarily on our Discord server. We are a growing community aiming to&nbsp;learn&nbsp;and grow&nbsp;collectively.&nbsp;</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                  <div class="row">
                     <div class="col-4"><img class="img-fluid" src="{{ asset('assets-welcome/images/icon-3.svg') }}" /></div>
                     <div class="col-8">
                        <h5 class="card-p2 medium p-color bold">What is the cost?</h5>
                        <p class="card-p2 medium p-color opac">We are confident in our results. We will invoice a 20% commission&nbsp;on&nbsp;trade earnings at the end of each week.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row pt-0 pt-md-5">
               <div class="col-md-4 wow fadeInUp" data-wow-delay=".8s">
                  <div class="row">
                     <div class="col-4"><img class="img-fluid" src="{{ asset('assets-welcome/images/icon-4.svg') }}" /></div>
                     <div class="col-8">
                        <h5 class="card-p2 medium p-color bold">What are the average returns?</h5>
                        <p class="card-p2  medium opac p-color">ROI heavily varies on the market&#39;s performance. Average returns will be around 5-15% during the course of an entire month;&nbsp;with good months performing&nbsp;significantly higher.</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 wow fadeInUp" data-wow-delay=".8s">
                  <div class="row">
                     <div class="col-4"><img class="img-fluid" src="{{ asset('assets-welcome/images/icon-5.svg') }}" /></div>
                     <div class="col-8">
                        <h5 class="card-p2 medium p-color bold">What is the risk?</h5>
                        <p class="card-p2 medium p-color opac">Trades will close in a loss from time to time, it happens. There is a stop-loss in place that would limit loss to around 5-10%. Win rate will consistently outweigh loss.&nbsp;</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 wow fadeInUp" data-wow-delay=".8s">
                  <div class="row">
                     <div class="col-4"><img class="img-fluid" src="{{ asset('assets-welcome/images/icon-6.svg') }}" /></div>
                     <div class="col-8">
                        <h5 class="card-p2 medium p-color bold">I am an experienced trader</h5>
                        <p class="card-p2 medium p-color opac">If you are an experienced trader, we still got you covered. Advanced tools will be made available&nbsp;in an&nbsp;upcoming update.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--    /////header content starts here////////////-->
      <section class="slider-bg py-4 align-items-center">
         <div class="container">
            <h2 class="text-center pt-5 medium text-white wow fadeInUp" data-wow-delay=".5s" id="results">October's Return on Investment</h2>
            <div class="carousel slide py-2 py-md-5" data-ride="carousel" id="carouselExampleControls">
               <ol class="carousel-indicators">
                  <li class="active" data-slide-to="0" data-target="#carouselExampleControls"></li>
                  <li data-slide-to="1" data-target="#carouselExampleControls"></li>
                  <li data-slide-to="2" data-target="#carouselExampleControls"></li>
                  <!--<li data-slide-to="2" data-target="#carouselExampleControls"></li>-->
               </ol>
               <div class="carousel-inner mx-auto inner-bg p-3">
                  <div class="carousel-item active"><img class="img-fluid" src="{{ asset('assets-welcome/images/ProfitAndLoss.png') }}" /></div>
                  <!--slider-1 ends-->
                  <div class="carousel-item"><img class="img-fluid" src="{{ asset('assets-welcome/images/OctoberPositionspg2.png') }}" /></div>
                  <!--slider-2 ends-->
                  <div class="carousel-item"><img class="img-fluid" src="{{ asset('assets-welcome/images/OctoberPositionspg4.png') }}" /></div>
                  <!--slider-3 ends-->
               </div>
               <a class="carousel-control-prev" data-slide="prev" href="#carouselExampleControls" role="button"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span> </a> <a class="carousel-control-next" data-slide="next" href="#carouselExampleControls" role="button"> <span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span> </a>
            </div>
            <!--   ///////////////slider ends here/////////////-->
            <p class="pt-4"></p>
         </div>
         <p class="pb-5"></p>
      </section>
      <section class="py-5">
         <div class="container text-center">
            <h2 class="text-center medium pt-3 pt-md-5 wow fadeInUp" data-wow-delay=".5s" id="support">What are you waiting for?</h2>
            <p class="p1 text-center p-3 wow fadeInUp" data-wow-delay=".8s">Sign up for your account today and begin trading!</p>
            <div class="row py-0 py-md-5 ">
               <div class="col-md-4 pt-3 pt-md-0 wow fadeInUp" data-wow-delay=".8s">
                  <img class="img-fluid" src="{{ asset('assets-welcome/images/img-ft-1.svg') }}" />
                  <p class="p1 text-center medium frst-letter">Select your risk level</p>
               </div>
               <div class="col-md-4 pt-3 pt-md-0 wow fadeInUp" data-wow-delay=".8s">
                  <img class="img-fluid" src="{{ asset('assets-welcome/images/img-ft-2.svg') }}" />
                  <p class="p1  text-center medium frst-letter">Begin trading with one click</p>
               </div>
               <div class="col-md-4 pt-3 pt-md-0 wow fadeInUp" data-wow-delay=".8s">
                  <img class="img-fluid" src="{{ asset('assets-welcome/images/img-ft-3.svg') }}" />
                  <p class="p1 text-center medium frst-letter">Track your profits on the go</p>
               </div>
            </div>
         </div>
      </section>
      <section class="pb-md-5">
         <div class="container bg wow fadeInUp" data-wow-delay=".8s">
            <h2 class="text-center pt-3 medium pt-md-5 text-white">We're here for you.
               <br />
            </h2>
            <p class="text-center"><a class="btn get-started" href="{{ route('register') }}">Get Started</a></p>
            <div class="text-right pb-2"><img class="img-fluid" src="{{ asset('assets-welcome/images/icon-get.png') }}" /></div>
         </div>
      </section>
      <p class="py-4"></p>
      <section class="bg-footer pt-4">
         <div class="container">
            <div class="row py-3 text-white">
               <div class="col-md-3 pt-3 pt-md-0">
                  <a href="{{ route('index') }}"><img class="img-fluid" src="{{ asset('assets-welcome/images/logo.svg') }}" /></a>
                  <p class="text-copyright medium pt-2">&copy;2021, All Rights Reserved</p>
                  <div class="footer-img py-3">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</div>
               </div>
               <div class="col-md-3 pt-3 pt-md-0">
                  <p class="card-p2 "><span class="p1 footer-color medium">About Us</span><br />
                     Making cryptocurrency more accessible for everyone, day by day.
                  </p>
               </div>
               <div class="col-md-3 pt-3 pt-md-0">
                  <p class="card-p2 "><span class="p1 footer-color medium">Feel free to contact us</span><br />
                     <a href="mailto:support@coinpilot.com" style="text-decoration:none; color:white">support@coinpilot.com</a>
                  </p>
               </div>
               <div class="col-md-3 pt-3 pt-md-0">
                  <p class="card-p2 "><span class="p1 footer-color medium">Support</span><br />
                     <a href="#" style="text-decoration:none; color:white">Live chat</a><br />
                     <a href="{{ route('terms') }}" style="text-decoration:none; color:white"> Terms & Conditions</a><br />
                     <a href="{{ route('privacy') }}" style="text-decoration:none; color:white">Privacy Policy</a>
               </div>
            </div>
         </div>
      </section>
      <!-- JS Files --><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script><!--<script src="assets/js/script.js"></script>--><script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script><script>
         new WOW().init();
      </script>
   </body>
</html>
