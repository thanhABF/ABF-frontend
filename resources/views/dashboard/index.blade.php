@extends('dashboard.layouts.app')
@section('content')
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Dashboard</h3>
                            <div class="nk-block-des text-soft">
                                <p>Welcome to Coinpilot Dashboard.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <!--<div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span class="d-none d-md-inline">Last</span> 30 Days</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>Last 30 Days</span></a></li>
                                                        <li><a href="#"><span>Last 6 Months</span></a></li>
                                                        <li><a href="#"><span>Last 1 Years</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Reports</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>--><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-12">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="card-title-group pb-3 g-2">
                                        <div class="card-title card-title-sm">
                                            <h6 class="title">Statistic</h6>
                                            <p>The statistics of the trades</p>
                                        </div>
                                        <div class="card-tools shrink-0 d-none d-sm-block">
                                            <ul class="nav nav-switch-s2 nav-tabs bg-white">
                                                <li class="nav-item"><a href="#" class="nav-link active">BTC</a></li>
                                                <!--<li class="nav-item"><a href="#" class="nav-link">USDT</a></li>-->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="">
                                          <div class="row">
                                            <div class="col-6 col-md-3 mt-1">
                                              <div class="analytic-data">
                                                  <div class="title">Total Profit</div>
                                                  <div class="amount">{{ $profit }} <small><em class="icon ni ni-sign-btc"></em></small></div>
                                                  <!--<div class="change up"><em class="icon ni ni-arrow-long-up"></em>12.37%</div>-->
                                              </div>
                                            </div>
                                            <div class="col-6 col-md-3 mt-1">
                                              <div class="analytic-data">
                                                  <div class="title">Total invested</div>
                                                  <div class="amount">{{ $invested }} <small><em class="icon ni ni-sign-btc"></em></small></div>
                                                  <!--<div class="change up"><em class="icon ni ni-arrow-long-up"></em>47.74%</div>-->
                                              </div>
                                            </div>
                                            <div class="col-6 col-md-3 mt-1">
                                              <div class="analytic-data">
                                                <div class="title">Total return</div>
                                                <div class="amount">{{ $return }} <small><em class="icon ni ni-sign-btc"></em></small></div>
                                                <!--<div class="change up"><em class="icon ni ni-arrow-long-up"></em>47.74%</div>-->
                                              </div>
                                            </div>
                                            <div class="col-6 col-md-3 mt-1">
                                              <div class="analytic-data">
                                                  <div class="title">Amount closed trades</div>
                                                  <div class="amount">{{ $amount_trades }}</div>
                                                  <!--<div class="change down"><em class="icon ni ni-arrow-long-down"></em>0.35%</div>-->
                                              </div>
                                            </div>
                                          </div>




                                        </div>

                                        <div class="card-title card-title-sm mt-5">
                                            <h6 class="title text-center">Profit per day, BTC</h6>
                                        </div>
                                        <div class="analytic-ov-ck">
                                            <canvas class="analytics-line-large" id="tradesData"></canvas>
                                        </div>
                                        <div class="chart-label-group ml-5">
                                            <div class="chart-label">{{ $firstDay }}</div>
                                            <!--<div class="chart-label d-none d-sm-block">15 Jan, 2020</div>-->
                                            <div class="chart-label">{{ $lastDay }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->
@endsection
