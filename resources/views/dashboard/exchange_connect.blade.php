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
                            <h3 class="nk-block-title page-title">Connect exchange</h3>
                            <div class="nk-block-des text-soft">
                                <p>Connect your exchange account to Coinpilot</p>
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
                                  <form action="{{ route('dashboard.exchange.add') }}" method="POST" class="gy-3">
                                      @csrf
                                      <div class="row g-3 align-center">
                                          <div class="col-sm-4 col-md-3">
                                              <div class="form-group">
                                                  <label class="form-label" for="exchange-name">Name</label>
                                                  <span class="form-note">Internal name</span>
                                              </div>
                                          </div>
                                          <div class="col-sm-8 col-md-9">
                                              <div class="form-group">
                                                  <div class="form-control-wrap">
                                                      <input type="text" name="name" class="form-control" id="exchange-name" value="">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row g-3 align-center">
                                          <div class="col-sm-4 col-md-3">
                                              <div class="form-group">
                                                  <label class="form-label" for="api_key">API Key</label>
                                                  <span class="form-note">Enter API Key</span>
                                              </div>
                                          </div>
                                          <div class="col-sm-8 col-md-9">
                                              <div class="form-group">
                                                  <div class="form-control-wrap">
                                                      <input type="text" name="api_key" class="form-control" id="api_key" value="">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row g-3 align-center">
                                          <div class="col-sm-4 col-md-3">
                                              <div class="form-group">
                                                  <label class="form-label" for="api_secret">API Secret</label>
                                                  <span class="form-note">Enter API Secret</span>
                                              </div>
                                          </div>
                                          <div class="col-sm-8 col-md-9">
                                              <div class="form-group">
                                                  <div class="form-control-wrap">
                                                      <input type="text" name="api_secret" class="form-control" id="api_secret" value="">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row g-3 align-center">
                                          <div class="col-sm-4 col-md-3">
                                              <div class="form-group">
                                                  <label class="form-label" for="exchange_based">Exchange</label>
                                                  <span class="form-note">Choose your exchange</span>
                                              </div>
                                          </div>
                                          <div class="col-sm-8 col-md-9">
                                              <ul class="custom-control-group g-3 align-center flex-wrap">
                                                  <li>
                                                      <div class="custom-control custom-radio">
                                                          <input type="radio" class="custom-control-input" checked name="exchange_based" id="exchange_based" value="Binance">
                                                          <label class="custom-control-label" for="reg-enable">Binance</label>
                                                      </div>
                                                  </li>
                                              </ul>
                                          </div>
                                      </div>
                                      <div class="row g-3 align-center">
                                          <div class="col-sm-4 col-md-3">
                                              <div class="form-group">
                                                  <label class="form-label" for="exchange_based">DCA</label>
                                                  <span class="form-note">Use DCA strategy</span>
                                              </div>
                                          </div>
                                          <div class="col-sm-8 col-md-9">
                                              <ul class="custom-control-group g-3 align-center flex-wrap">
                                                  <li>
                                                      <div class="custom-control custom-radio">
                                                          <input type="radio" class="custom-control-input" name="exchange_dca" id="exchange_dca_yes" checked value="yes">
                                                          <label class="custom-control-label" for="exchange_dca_yes">Enable</label>
                                                      </div>
                                                  </li>
                                                  <li>
                                                      <div class="custom-control custom-radio">
                                                          <input type="radio" class="custom-control-input" name="exchange_dca" id="exchange_dca_no" value="no">
                                                          <label class="custom-control-label" for="exchange_dca_no">Disable</label>
                                                      </div>
                                                  </li>
                                              </ul>
                                          </div>
                                      </div>
                                      <div class="row g-3">
                                          <div class="col-sm-4 col-md-3">
                                          </div>
                                          <div class="col-sm-8 col-md-9">
                                              <div class="form-group mt-2">
                                                  <button type="submit" class="btn btn-lg btn-primary">Connect</button>
                                              </div>
                                          </div>
                                      </div>
                                  </form>


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
