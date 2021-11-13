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
                                <p>Connect your Exchange account to the Coinpilot</p>
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
                                  <form action="{{ route('dashboard.exchange.edit_api') }}" method="POST" class="gy-3">
                                      @csrf
                                      <input type="hidden" name="exchange_id" value="{{ $exchange_id }}">
                                      <div class="row g-3 align-center">
                                          <div class="col-sm-4 col-md-3">
                                              <div class="form-group">
                                                  <label class="form-label" for="exchange-name">Name</label>
                                                  <span class="form-note">Internal name</span>
                                              </div>
                                          </div>
                                          <div class="col-sm-8 col-md-9">
                                              <div class="form-group">
                                                  <label class="form-label" for="exchange-name">{{ $exchange[0]['name'] }}</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row g-3 align-center">
                                          <div class="col-sm-4 col-md-3">
                                              <div class="form-group">
                                                  <label class="form-label" for="exchange-name">Status</label>
                                                  <span class="form-note">Connection status of exchange</span>
                                              </div>
                                          </div>
                                          <div class="col-sm-8 col-md-9">
                                              <div class="form-group">
                                                @if($exchange[0]['status'] == 'connected')
                                                    <span class="badge badge-sm badge-dim badge-outline-success d-none d-md-inline-flex">Connected</span>
                                                @elseif($exchange[0]['status'] == 'checking')
                                                    <span class="badge badge-sm badge-dim badge-outline-warning d-none d-md-inline-flex">Checking</span>
                                                @elseif($exchange[0]['status'] == 'error')
                                                    <span class="badge badge-sm badge-dim badge-outline-danger d-none d-md-inline-flex">Error: API</span>
                                                @endif
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
                                                      <input type="text" name="api_key" class="form-control" id="api_key" value="" placeholder="************">
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
                                                      <input type="password" name="api_secret" class="form-control" id="api_secret" value="" placeholder="************">
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
                                                          <input type="radio" class="custom-control-input" name="exchange_based" id="exchange_binance" @if($exchange[0]['exchange_based'] == 'Binance' xor empty($exchange[0]['exchange_based'])) checked @endif value="Binance" onclick="show1();">
                                                          <label class="custom-control-label" for="exchange_binance">Binance</label>
                                                      </div>
                                                  </li>
                                                  <li>
                                                      <div class="custom-control custom-radio">
                                                          <input type="radio" class="custom-control-input" name="exchange_based" id="exchange_kucoin" @if($exchange[0]['exchange_based'] == 'Kucoin') checked @endif value="Kucoin" onclick="show2();">
                                                          <label class="custom-control-label" for="exchange_kucoin">Kucoin</label>
                                                      </div>
                                                  </li>
                                              </ul>
                                          </div>
                                      </div>
                                      

                                      <div id="div1" class="hide">
                                        <div class="row g-3 align-center">
                                          <div class="col-sm-4 col-md-3">
                                              <div class="form-group">
                                                  <label class="form-label" for="api_passphrase">API Passphrase</label>
                                                  <span class="form-note">Enter API Passphrase</span>
                                              </div>
                                          </div>
                                          <div class="col-sm-8 col-md-9">
                                              <div class="form-group">
                                                  <div class="form-control-wrap">
                                                      <input type="text" name="api_passphrase" class="form-control" id="api_passphrase" value="">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      
                                    <div class="row g-3 align-center">
                                          <div class="col-sm-4 col-md-3">
                                              <div class="form-group">
                                                  <label class="form-label" for="exchange_based">KuCoin</label>
                                                  <span class="form-note">Is this a sub-account?<a style="margin-left:6px;" href="#" title="If you are unsure, you do not have a sub-account." class="tooltip"><em class="icon ni ni-info-fill"></em></a></span>
                                              </div>
                                          </div>
                                          <div class="col-sm-8 col-md-9">
                                              <ul class="custom-control-group g-3 align-center flex-wrap">
                                                  <li>
                                                      <div class="custom-control custom-radio">
                                                          <input type="radio" class="custom-control-input" name="kucoin_subaccount" id="kucoin_subaccount_no" checked value="yes">
                                                          <label class="custom-control-label" for="kucoin_subaccount_no">No</label>
                                                      </div>
                                                  </li>
                                                  <li>
                                                      <div class="custom-control custom-radio">
                                                          <input type="radio" class="custom-control-input" name="kucoin_subaccount" id="kucoin_subaccount_yes" value="no">
                                                          <label class="custom-control-label" for="kucoin_subaccount_yes">Yes</label>
                                                      </div>
                                                  </li>
                                              </ul>
                                          </div>
                                      </div>
                                    </div>

                                    <div class="row g-3">
                                          <div class="col-sm-4 col-md-3">
                                          </div>
                                          <div class="col-sm-8 col-md-9">
                                              <div class="form-group mt-2">
                                                  <button type="submit" class="btn btn-lg btn-primary">Save settings</button>
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
<script type="text/javascript">
  function show1(){
  document.getElementById('div1').style.display ='none';
}
function show2(){
  document.getElementById('div1').style.display = 'block';
}
</script>


@endsection
