@extends('dashboard.layouts.app')
@section('content')
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="content-page wide-md m-auto">
                    <div class="nk-block-head nk-block-head-lg wide-sm mx-auto">
                        <div class="nk-block-head-content text-center">
                            <h2 class="nk-block-title fw-normal">Getting started with Coinpilot</h2>
                            <div class="nk-block-des">
                                <p class="lead"></p>
                                <p class="text-soft ff-italic"></p>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                      <div class="row">
                          <div class="col-12">
                              <div class="card card-bordered">
                                  <div class="card-inner card-inner-xl">
                                      <article class="entry">

                                          <p>Welcome to Coinpilot! Currently we are offering Binance.com and KuCoin exchanges.</p>
                                          <p>You will need to create and attach your API key to Coinpilot from your chosen exchange.</p>
                                          <p>By clicking on your exchange below, you can find a step-by-step guide to complete the process.
                                          <p><b><u>Important mention</u></b></p>
                                          <p>It's recommended to have atleast 0.02 BTC for optimal results. If you are under this thresh-hold your position sizes will be minimum due to not having a balance large enough to enable percentage based position sizes of 3%.</p>
                                          <p>Trading under the thresh-hold will still preform great, there will just be a lack of optimization.</p>
                                          <div id="accordion" class="accordion">
                                <div class="accordion-item">
                                    <a href="#" class="accordion-head" data-toggle="collapse" data-target="#accordion-item-1">
                                        <h6 class="title">Binance</h6>
                                        <span class="accordion-icon"></span>
                                    </a>
                                    <div class="accordion-body collapse" id="accordion-item-1" data-parent="#accordion">
                                        <div class="accordion-inner">
                                        <p>Binance sign-up link: <a href="https://www.binance.com/en/register?ref=153831969" target="_blank">https://www.binance.com/</a></p>
                                          <h5>Once you have a Binance account, create an API key</h5>
                                          <div class="row col-12 col-sm-10 col-md-8">
                                              <img src="https://cdn.discordapp.com/attachments/845923757448101898/845924021665136671/setup1.jpg" alt="">
                                          </div>
                                          <p>Make sure withdrawl is not enabled and all other options match the image (should be default)</p>
                                          <div class="row col-12 col-sm-10 col-md-8">
                                              <img src="https://cdn.discordapp.com/attachments/845923757448101898/845924194188263464/setup2_1.jpg" alt="">
                                          </div>
                                          <h5 class="mt-5">Once your API key is created, connect it on Coinpilot under "exchanges", or go to: <a href="{{ route('dashboard.exchange.connect') }}">Connect</a></h5>
                                          <div class="row col-12 col-sm-10 col-md-8">
                                              <img src="https://cdn.discordapp.com/attachments/845923757448101898/845924546238218260/setup3.jpg" alt="">
                                          </div>
                                          <h5 class="mt-5">Once you hit connect, you're done!</h5>
                                          <p>Trading will begin shortly and all statistics will display on your dashboard.</p>
                                        </div>
                                        </div>
                                </div>
                                <div class="accordion-item">
                                    <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-2">
                                        <h6 class="title">KuCoin</h6>
                                        <span class="accordion-icon"></span>
                                    </a>
                                    <div class="accordion-body collapse" id="accordion-item-2" data-parent="#accordion" >
                                        <div class="accordion-inner">
                                        <p>Kucoin sign-up link: <a href="https://www.kucoin.com/ucenter/signup" target="_blank">https://www.kucoin.com/</a></p>
                                        <h5>Once you have a KuCoin account, create an API key</h5>
                                        <div class="row col-12 col-sm-10 col-md-8">
                                              <img src="https://media.discordapp.net/attachments/904694533101584444/904698275876200458/unknown.png" alt="">
                                            </div>
                                        <p>Be sure to remember your passphrase and to have the options checked as shown below</p>
                                        <div class="row col-12 col-sm-10 col-md-8">
                                              <img src="https://cdn.discordapp.com/attachments/904694533101584444/904699387278659645/unknown_1.png" alt="">
                                            </div>
                                            <h5 class="mt-5">Once your API key is created, connect it on Coinpilot under "exchanges", or go to: <a href="{{ route('dashboard.exchange.connect') }}">Connect</a></h5>
                                          <div class="row col-12 col-sm-10 col-md-8">
                                              <img src="https://cdn.discordapp.com/attachments/904694533101584444/904817167864840262/e112df2a607de1a557e1ffc018e4aca4.png" alt="">
                                          </div>
                                          <p>Lastly, make sure that you transfer your balance into your trade fund</p>
                                          <div class="row col-12 col-sm-10 col-md-8">
                                              <img src="https://cdn.discordapp.com/attachments/904694533101584444/904700746551939112/Transfer.png" alt="">                                      
                                          </div>
                                          <h5>Once your API key is connected, you're done!</h5>
                                          <p>Trading will begin shortly and all statistics will display on your dashboard.</p>
                                        </div>
                                        </div> 
                                      </article>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div><!-- .nk-block -->
                </div><!-- .content-page -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->
@endsection
