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
                            <h2 class="nk-block-title fw-normal">Monthly Reports</h2>
                            <div class="nk-block-des">
                                <p class="lead"></p>
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
                                        <h6 class="title">November</h6>
                                        <span class="accordion-icon"></span>
                                    </a>
                                    <div class="accordion-body collapse" id="accordion-item-1" data-parent="#accordion">
                                        <div class="accordion-inner">
                                        <a href="http:coinpilot.com/assets-welcome/images/November%20Report.pdf" class="pdf-btn" target="blank">Click to download the report</a>
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
