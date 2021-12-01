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
                            <h3 class="nk-block-title page-title">Exchange list</h3>
                            <div class="nk-block-des text-soft">
                                <p>The list of your Exchange accounts</p>
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
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner p-0">
                                <div class="nk-tb-list nk-tb-tnx">
                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col"><span>Name</span></div>
                                        <div class="nk-tb-col"><span>Exchange</span></div>
                                        <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-none d-md-block">Status</span></div>
                                        <div class="nk-tb-col"><span>DCA</span></div>
                                        <div class="nk-tb-col nk-tb-col-tools"></div>
                                    </div><!-- .nk-tb-item -->
                                    @if(!empty($exchanges))
                                      @foreach($exchanges as $exchange)
                                          <div class="nk-tb-item">
                                              <div class="nk-tb-col">
                                                  <div class="nk-tnx-type">
                                                      <div class="nk-tnx-type-text">
                                                          <span class="tb-lead">{{ $exchange['name'] }}</span>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="nk-tb-col">
                                                  <span class="tb-lead-sub">{{ $exchange['exchange_based'] }}</span>
                                              </div>
                                              <div class="nk-tb-col nk-tb-col-status">
                                                  <div class="dot dot-success d-md-none"></div>
                                                  @if($exchange['status'] == 'connected')
                                                      <span class="badge badge-sm badge-dim badge-outline-success d-none d-md-inline-flex">Connected</span>
                                                  @elseif($exchange['status'] == 'checking')
                                                      <span class="badge badge-sm badge-dim badge-outline-warning d-none d-md-inline-flex">Checking</span>
                                                  @elseif($exchange['status'] == 'error')
                                                      <span class="badge badge-sm badge-dim badge-outline-danger d-none d-md-inline-flex">Error: API</span>
                                                  @elseif($exchange['status'] == 'stopped')
                                                      <span class="badge badge-sm badge-dim badge-outline-warning d-none d-md-inline-flex">Stopped</span>
                                                  @endif
                                              </div>
                                              <div class="nk-tb-col">
                                                  <div class="dot dot-success d-md-none"></div>
                                                  @if($exchange['dca'] == 'yes' xor empty($exchange['dca']))
                                                      <span class="badge badge-sm badge-dim badge-outline-success">Yes</span>
                                                  @else
                                                      <span class="badge badge-sm badge-dim badge-outline-warning">No</span>
                                                  @endif
                                              </div>
                                              <div class="nk-tb-col nk-tb-col-tools">
                                                  <ul class="nk-tb-actions gx-2">
                                                      <li class="nk-tb-action-hidden">
                                                          <a href="{{ route('dashboard.exchange.api', $exchange['id']) }}" class="bg-white btn btn-sm btn-outline-light btn-icon" data-toggle="tooltip" data-placement="top" title="Settings"><em class="icon ni ni-code"></em></a>
                                                      </li>
                                                      <!--
                                                      <li class="nk-tb-action-hidden">
                                                          <a href="#tranxDetails" data-toggle="modal" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" title="Settings"><em class="icon ni ni-setting"></em></a>
                                                      </li>
                                                      -->
                                                      <li class="nk-tb-action-hidden">
                                                          <a href="{{ route('dashboard.exchange.delete', $exchange['id']) }}" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" data-toggle="tooltip" data-placement="top" title="Delete Exchange"><em class="icon ni ni-trash"></em></a>
                                                      </li>
                                                      <li>
                                                          <div class="dropdown">
                                                              <a href="#" class="dropdown-toggle bg-white btn btn-sm btn-outline-light btn-icon" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                          </div>
                                                      </li>
                                                  </ul>
                                              </div>
                                          </div><!-- .nk-tb-item -->
                                      @endforeach
                                    @endif
                                </div><!-- .nk-tb-list -->

                                @if(empty($exchanges))
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="mx-auto mt-3 mb-3" style="display: inline-block;">
                                              <a href="{{ route('dashboard.exchange.connect') }}" class="btn btn-primary">Connect exchange</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div><!-- .card-inner -->
                        </div><!-- .card-inner-group -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->



@endsection
