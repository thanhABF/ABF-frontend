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
                            <h2 class="nk-block-title fw-normal">FAQ</h2>
                            <div class="nk-block-des">
                                <p class="lead">Frequently Asked Questions</p>
                                <p class="text-soft ff-italic"></p>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                      <div class="">
                          <div class="">
                            <div id="accordion" class="accordion">
                                <div class="accordion-item">
                                    <a href="#" class="accordion-head" data-toggle="collapse" data-target="#accordion-item-1">
                                        <h6 class="title">What exactly do you offer, may I have a TLDR?</h6>
                                        <span class="accordion-icon"></span>
                                    </a>
                                    <div class="accordion-body collapse" id="accordion-item-1" data-parent="#accordion">
                                        <div class="accordion-inner">
                                            <p>We have a trading algorithm that preforms very well. We provide you access to our algorithm through our user friendly interface.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-2">
                                        <h6 class="title">What are the costs?</h6>
                                        <span class="accordion-icon"></span>
                                    </a>
                                    <div class="accordion-body collapse" id="accordion-item-2" data-parent="#accordion" >
                                        <div class="accordion-inner">
                                            <p>There are <b>0</b> upfront costs! We only make money when you do. We invoice you 20% of your earnings, weekly.<br>
                                              For example, if you've earned $100 profit trading on Coinpilot, you will be invoiced 20$.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-3">
                                        <h6 class="title">Is there a minimum investment to get started?</h6>
                                        <span class="accordion-icon"></span>
                                    </a>
                                    <div class="accordion-body collapse" id="accordion-item-3" data-parent="#accordion" >
                                        <div class="accordion-inner">
                                            <p>It's recommended to have at least 0.02 + BTC for optimal results. If you are under this threshold your position sizes will be minimum due to not having a balance large enough to enable percentage based position sizes of 3%.

Trading under the threshold will still preform great, there will just be a lack of optimization.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-4">
                                        <h6 class="title">How are my funds protected? What stops you from stealing my assets?</h6>
                                        <span class="accordion-icon"></span>
                                    </a>
                                    <div class="accordion-body collapse" id="accordion-item-4" data-parent="#accordion" >
                                        <div class="accordion-inner">
                                            <p>Taking your assets is not possible. You provide us with an API key without the permissions for withdrawing. All we can do with an API key is submit trades.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-5">
                                        <h6 class="title">What are the risks? What could go wrong?</h6>
                                        <span class="accordion-icon"></span>
                                    </a>
                                    <div class="accordion-body collapse" id="accordion-item-5" data-parent="#accordion" >
                                        <div class="accordion-inner">
                                            <p>There is always a risk when it comes to trading, though we minimize these risks by executing multiple trades and having appropriate stop loss. In the worst case scenario (Which should never happen), closing 10 trades at a loss would result in a 11.2% loss. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-6">
                                        <h6 class="title">I am a U.S customer and Binance is not supported in the U.S.</h6>
                                        <span class="accordion-icon"></span>
                                    </a>
                                    <div class="accordion-body collapse" id="accordion-item-6" data-parent="#accordion" >
                                        <div class="accordion-inner">
                                            <p>If you are from the U.S. or another country that disallows Binance, we are now offering Kucoin as an accepted exchange!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-7">
                                        <h6 class="title">I am an experienced trader and want to be able to input my own trading strategy into the bot.</h6>
                                        <span class="accordion-icon"></span>
                                    </a>
                                    <div class="accordion-body collapse" id="accordion-item-7" data-parent="#accordion" >
                                        <div class="accordion-inner">
                                            <p>We are not ready for this yet; thought it is planned to come soon. All of our competitors are aimed for experienced traders. We believe the every day person should have the opportunity to take advantage of crypto trading and our prime demographic is to attract new investors into the field with our friendly interface and ease of use.</p>
                                        </div>
                                    </div>
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
