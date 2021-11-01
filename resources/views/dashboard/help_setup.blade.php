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
                                          <p>Binance sign-up link: <a href="https://www.binance.com/en/register?ref=153831969" target="_blank">https://www.binance.com/</a></p>
                                          <p>Note: Depositing on Coinpilot is for paying invoices, not for trading!</p>
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
                                          <p>Remember, you must have at least <b>0.002</b> BTC!</p>
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
