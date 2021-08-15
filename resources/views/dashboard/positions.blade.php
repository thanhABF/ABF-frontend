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
                            <h3 class="nk-block-title page-title">Closed positions</h3>
                            <div class="nk-block-des text-soft">
                                <p>The list: closed positions</p>
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
                                            <h6 class="title">Trade history</h6>
                                            <p></p>
                                        </div>
                                        <div class="card-tools shrink-0 d-none d-sm-block">

                                              <ul class="card-tools-nav nav">
                                                  <li>
                                                      <a class="nav-link" data-toggle="tab" href="#tabOpenPositions">Open positions</a>
                                                  </li>
                                                  <li>
                                                      <a class="nav-link active" data-toggle="tab" href="#tabClosedPositions">Closed positions</a>
                                                  </li>
                                              </ul>

                                        </div>
                                    </div>

                                    <div class="tab-content">
                                        <div class="tab-pane" id="tabOpenPositions">
                                            <div class="pt-3 pb-3 table-scroll-style" style="overflow:auto;">
                                              <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                  <thead>
                                                      <tr class="nk-tb-item nk-tb-head">
                                                          <th class="nk-tb-col"><span class="sub-text">Open date</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Pair</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Invested</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Entry price</span></th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach($openPositions as $position)
                                                      <tr class="nk-tb-item">
                                                          <td class="nk-tb-col">
                                                              <span>{{ $position['OpenDate'] }}</span>
                                                          </td>
                                                          <td class="nk-tb-col">
                                                              <span>{{ $position['Pair'] }}</span>
                                                          </td>
                                                          <td class="nk-tb-col">
                                                              <span>{{ $position['Invested'] }}</span>
                                                          </td>
                                                          <td class="nk-tb-col">
                                                              <span>{{ $position['EntryPrice'] }}</span>
                                                          </td>
                                                      </tr><!-- .nk-tb-item  -->
                                                    @endforeach
                                                  </tbody>
                                              </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane active" id="tabClosedPositions">
                                            <div class="pt-3 pb-3 table-scroll-style" style="overflow:auto;">
                                              <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                  <thead>
                                                      <tr class="nk-tb-item nk-tb-head">
                                                          <th class="nk-tb-col"><span class="sub-text">Open date</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Close date</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Pair</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Invested</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Entry price</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Exit price</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Profit</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Fees</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">NetProfit</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">NetProfit, %</span></th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach($closedPositions as $position)
                                                      <tr class="nk-tb-item">
                                                          <td class="nk-tb-col">
                                                              <span>{{ $position['OpenDate'] }}</span>
                                                          </td>
                                                          <td class="nk-tb-col">
                                                              <span>{{ $position['CloseDate'] }}</span>
                                                          </td>
                                                          <td class="nk-tb-col">
                                                              <span>{{ $position['Pair'] }}</span>
                                                          </td>
                                                          <td class="nk-tb-col">
                                                              <span>{{ $position['Invested'] }}</span>
                                                          </td>
                                                          <td class="nk-tb-col">
                                                              <span>{{ $position['EntryPrice'] }}</span>
                                                          </td>
                                                          <td class="nk-tb-col">
                                                              <span>{{ $position['ExitPrice'] }}</span>
                                                          </td>
                                                          <td class="nk-tb-col">
                                                              <span>{{ $position['Profit'] }}</span>
                                                          </td>
                                                          <td class="nk-tb-col">
                                                              <span>{{ $position['Fees'] }}</span>
                                                          </td>
                                                          <td class="nk-tb-col">
                                                            @if((float)$position['NetProfit'] >= 0)
                                                              <span class="tb-status text-success">{{ $position['NetProfit'] }}</span>
                                                            @else
                                                              <span class="tb-status text-danger">{{ $position['NetProfit'] }}</span>
                                                            @endif
                                                          </td>
                                                          <td class="nk-tb-col">
                                                            @if((float)$position['NetProfitPercent'] >= 0)
                                                              <span class="tb-status text-success">{{ $position['NetProfitPercent'] }}%</span>
                                                            @else
                                                              <span class="tb-status text-danger">{{ $position['NetProfitPercent'] }}%</span>
                                                            @endif
                                                          </td>
                                                      </tr><!-- .nk-tb-item  -->
                                                    @endforeach
                                                  </tbody>
                                              </table>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="">

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
