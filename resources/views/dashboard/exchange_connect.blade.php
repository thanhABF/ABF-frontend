@extends('dashboard.layouts.app')
@section('content')
<!-- content @s -->

<style type="text/css">
  .hide {
  display: none;
}
.tooltip {
  display: inline;
  position: relative;
  opacity:1 !important;
}
.tooltip:hover:after{
  display: -webkit-flex;
  display: flex;
  -webkit-justify-content: center;
  justify-content: center;
  background: #444;
  border-radius: 8px;
  color: #fff;
  content: attr(title);
  margin: -82px auto 0;
  font-size: 16px;
  padding: 13px;
  width: 220px;
}
.tooltip:hover:before{
  border: solid;
  border-color: #444 transparent;
  border-width: 12px 6px 0 6px;
  content: "";
  left: 45%;
  bottom: 30px;
  position: absolute;
}
</style>
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
                                                        <!-- <input style="margin-top: 4px;margin-right: 5px;" type="radio" name="tab" value="igotnone" onclick="show1();" />
Binance --->
                                                          <input type="radio" class="custom-control-input" name="exchange_based" id="exchange_binance" checked value="Binance" onclick="hide_kucoin_settings();">
                                                          <label class="custom-control-label" for="exchange_binance">Binance</label>
                                                      </div>&nbsp;&nbsp;



                                                      <div class="custom-control custom-radio">
                                                         <!-- <input style="margin-top: 4px;margin-right: 5px;" type="radio" name="tab" value="igottwo" onclick="show2();" />
Kukoin --->
                                                          <input type="radio" class="custom-control-input" name="exchange_based" id="exchange_kucoin" value="Kucoin" onclick="show_kucoin_settings();">
                                                          <label class="custom-control-label" for="exchange_kucoin">KuCoin</label>
                                                      </div>&nbsp;&nbsp;
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
                                                  <span class="form-note">Is this a sub-account?</span>
                                              </div>
                                          </div>
                                          <div class="col-sm-8 col-md-9">
                                              <ul class="custom-control-group g-3 align-center flex-wrap">
                                                  <li>
                                                      <div class="custom-control custom-radio">
                                                          <!-- <input style="margin-top: 4px;margin-right: 5px;" type="radio" name="tab" value="igotnone" onclick="show3();" />
No --->                                                         
                                                          <input type="radio" class="custom-control-input" name="kucoin_subaccount" id="kucoin_subaccount_no" checked value="yes" onclick="hide_kucoin_subaccount();">
                                                          <label class="custom-control-label" for="kucoin_subaccount_no">No</label>
                                                      </div>
                                                  </li>
                                                  <li>
                                                      <div class="custom-control custom-radio">
                                                          <!-- <input style="margin-top: 4px;margin-right: 5px;" type="radio" name="tab" value="igottwo" onclick="show4();" />
Yes --->                                                         
                                                          <input type="radio" class="custom-control-input" name="kucoin_subaccount" id="kucoin_subaccount_yes" value="no" onclick="show_kucoin_subaccount();">
                                                          <label class="custom-control-label" for="kucoin_subaccount_yes">Yes</label>
                                                  </li>
                                              </ul>
                                          </div>
                                      </div>
                                      </div>
                                                      <div id="div2" class="hide">
                                        <div class="row g-3 align-center">
                                          <div class="col-sm-4 col-md-3">
                                              <div class="form-group">
                                                  <label class="form-label" for="subaccount">Sub-account Name</label>
                                                  <span class="form-note">Enter sub-account name</span>
                                              </div>
                                          </div>
                                          <div class="col-sm-8 col-md-9">
                                              <div class="form-group">
                                                  <div class="form-control-wrap">
                                                      <input type="text" name="subaccount" class="form-control" id="subaccount" value="">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>

                                    <div class="row g-3 align-center">
                                          <div class="col-sm-4 col-md-3">
                                              <div class="form-group">
                                                  <label class="form-label" for="quote_asset">Quote symbol</label>
                                                  <span class="form-note">Which symbol do you want to trade?</span>
                                              </div>
                                          </div>
                                          <div class="col-sm-8 col-md-9">
                                              <ul class="custom-control-group g-3 align-center flex-wrap">
                                                  <li>
                                                      <div class="custom-control custom-radio">
                                                          <!-- <input style="margin-top: 4px;margin-right: 5px;" type="radio" name="tab" value="igotnone" onclick="show3();" />
No --->                                                         
                                                          <input type="radio" class="custom-control-input" name="quote_asset" id="quote_asset_btc" checked value="BTC" >
                                                          <label class="custom-control-label" for="quote_asset_btc">BTC</label>
                                                      </div>
                                                  </li>
                                                  <li>
                                                      <div class="custom-control custom-radio">
                                                          <!-- <input style="margin-top: 4px;margin-right: 5px;" type="radio" name="tab" value="igottwo" onclick="show4();" />
Yes --->                                                         
                                                          <input type="radio" class="custom-control-input" name="quote_asset" id="quote_asset_usdt" value="USDT" >
                                                          <label class="custom-control-label" for="quote_asset_usdt">USDT</label>
                                                  </li>
                                                  <li>
                                                      <div class="custom-control custom-radio">
                                                          <!-- <input style="margin-top: 4px;margin-right: 5px;" type="radio" name="tab" value="igottwo" onclick="show4();" />
Yes --->                                                         
                                                          <input type="radio" class="custom-control-input" name="quote_asset" id="quote_asset_both" value="BOTH" >
                                                          <label class="custom-control-label" for="quote_asset_both">BOTH</label>
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
<script type="text/javascript">
  function hide_kucoin_settings(){
  document.getElementById('div1').style.display ='none';
}
function show_kucoin_settings(){
  document.getElementById('div1').style.display = 'block';
}
</script>
<script type="text/javascript">
function hide_kucoin_subaccount(){
  document.getElementById('div2').style.display ='none';
}
function show_kucoin_subaccount(){
  document.getElementById('div2').style.display = 'block';
}
</script>
<!-- content @e -->



@endsection
