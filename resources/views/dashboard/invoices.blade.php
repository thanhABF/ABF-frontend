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
                            <h3 class="nk-block-title page-title">Invoices</h3>
                            <div class="nk-block-des text-soft">
                                <p>Coinpilot Balance & Invoices</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDepositBalance"><em class="icon ni ni-reports"></em><span>Deposit balance</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-lg-8">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-3">
                                        <div class="card-title">
                                            <h6 class="title">Overview</h6>
                                            <p>Balance and commission info</p>
                                        </div>
                                    </div><!-- .card-title-group -->
                                    <div class="nk-order-ovwg">
                                        <div class="row g-4 align-end">
                                            <div class="col-xxl-12">
                                                <div class="row g-4">
                                                    <div class="col-sm-6 col-xxl-6">
                                                        <div class="nk-order-ovwg-data buy">
                                                            @if((float)$balance >= 0)
                                                                <div class="amount">{{ number_format($balance, 2, '.', '') }} <small class="currenct currency-usd">USD</small></div>
                                                            @else
                                                                <div class="amount text-danger">{{ number_format($balance, 2, '.', '') }} <small class="currenct currency-usd">USD</small></div>
                                                            @endif
                                                            <div class="title"><em class="icon ni ni-arrow-down-left"></em> Total balance</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xxl-6">
                                                        <div class="nk-order-ovwg-data sell">
                                                            <div class="amount">{{ number_format($unpaid_commission, 2, '.', '') }} <small class="currenct currency-usd">USD</small></div>
                                                            <div class="title"><em class="icon ni ni-arrow-up-left"></em> Unpaid commission</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .col -->
                                        </div>
                                    </div><!-- .nk-order-ovwg -->
                                </div><!-- .card-inner -->
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-lg-4">
                            <div class="card card-bordered h-100">
                                <div class="card-inner-group">
                                    <div class="card-inner card-inner-md">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title mt-2 mb-1">Action Center</h6>
                                            </div>
                                        </div>
                                    </div><!-- .card-inner -->
                                    <div class="card-inner">
                                        <div class="nk-wg-action">
                                          <a href="#" data-toggle="modal" data-target="#modalDepositBalance">
                                            <div class="nk-wg-action-content">
                                                <em class="icon ni ni-cc-alt-fill"></em>
                                                <div class="title">Deposit balance</div>
                                                <p>We accept 6 coins: Bitcoin, Ethereum, USD Coin, Litecoin, Dai, Bitcoin Cash.</p>
                                            </div>
                                            </a>
                                            <a href="#" class="btn btn-icon btn-trigger mr-n2" data-toggle="modal" data-target="#modalDepositBalance"><em class="icon ni ni-forward-ios"></em></a>
                                        </div>
                                    </div><!-- .card-inner -->
                                </div><!-- .card-inner-group -->
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-12">
                            <div class="card card-bordered card-full">
                                <div class="card-inner">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title"><span class="mr-2">History</span></h6>
                                        </div>
                                        <div class="card-tools">
                                            <ul class="card-tools-nav nav">
                                                <li>
                                                    <a class="nav-link active" data-toggle="tab" href="#tabItem1">Commission</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" data-toggle="tab" href="#tabItem2">Deposit balance</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner p-0 border-top">
                                  <div class="tab-content">
                                      <div class="tab-pane active" id="tabItem1">
                                          <div class="pt-3 pb-3 table-scroll-style" style="overflow:auto;">
                                              <table class="datatable-init nk-tb-list nk-tb-ulist invoiceTable" data-auto-responsive="false">
                                                  <thead>
                                                      <tr class="nk-tb-item nk-tb-head">
                                                          <th class="nk-tb-col"><span class="sub-text">Date</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Profit</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Convertion Rate</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Commission Rate</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Commission</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Payment status</span></th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @if(!empty($commissions))
                                                        @foreach($commissions as $commission)
                                                          <tr class="nk-tb-item">
                                                              <td class="nk-tb-col">
                                                                  <span>{{ $commission['date'] }}</span>
                                                              </td>
                                                              <td class="nk-tb-col">
                                                                  <span>{{ number_format(round($commission['btc_profit'],8), 8, '.', '') }} BTC</span>
                                                              </td>
                                                              <td class="nk-tb-col">
                                                                  <span>1BTC = {{ number_format(round($commission['btc_rate'],2), 2, '.', '') }}$</span>
                                                              </td>
                                                              <td class="nk-tb-col">
                                                                  <span>{{ $commission['commission_rate'] * 100 }}%</span>
                                                              </td>
                                                              <td class="nk-tb-col">
                                                                  <span>{{ number_format(round($commission['total_commission_usd'],2), 2, '.', '') }}$</span>
                                                              </td>
                                                              <td class="nk-tb-col">
                                                                @if($commission['status'] == 'paid')
                                                                    <span class="tb-status text-success">Paid</span>
                                                                @elseif($commission['status'] == 'unpaid')
                                                                    <span class="tb-status text-warning">Unpaid</span>
                                                                @endif
                                                                  <!--<span class="tb-status text-success">Success</span>-->
                                                              </td>
                                                          </tr><!-- .nk-tb-item  -->
                                                        @endforeach
                                                    @endif
                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
                                      <div class="tab-pane" id="tabItem2">
                                          <div class="p-3">
                                              <table class="datatable-init nk-tb-list nk-tb-ulist invoiceTable" data-auto-responsive="true">
                                                  <thead>
                                                      <tr class="nk-tb-item nk-tb-head">
                                                          <th class="nk-tb-col"><span class="sub-text">Date</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Amount</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @if(!empty($payments))
                                                      @foreach($payments as $payment)
                                                        <tr class="nk-tb-item">
                                                            <td class="nk-tb-col">
                                                                <span>{{ Carbon\Carbon::parse($payment['date'])->format('Y-m-d H:i')  }}</span>
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                <span>{{ $payment['local_amount'] }} {{ $payment['local_currency'] }}</span>
                                                            </td>
                                                            <td class="nk-tb-col">
                                                              @if($payment['status'] == 'charge:created')
                                                                  <a href="{{ $payment['hosted_url'] }}"><span class="tb-status text-primary">New -> click to continue payment</span></a>
                                                              @elseif($payment['status'] == 'charge:resolved')
                                                                  <span class="tb-status text-success">Success</span>
                                                              @elseif($payment['status'] == 'charge:confirmed')
                                                                  <span class="tb-status text-success">Success</span>
                                                              @elseif($payment['status'] == 'charge:failed')
                                                                  <span class="tb-status text-danger">Failed</span>
                                                              @elseif($payment['status'] == 'charge:delayed')
                                                                  <span class="tb-status text-warning">Delayed</span>
                                                              @elseif($payment['status'] == 'charge:pending')
                                                                  <span class="tb-status text-warning">Pending</span>
                                                              @elseif($payment['status'] == 'referral:tier1')
                                                                  <span class="tb-status text-success">Referral program: Tier 1</span>
                                                              @elseif($payment['status'] == 'referral:transfer')
                                                                  <span class="tb-status text-success">Referral program: Transfer</span>
                                                              @endif
                                                            </td>
                                                        </tr><!-- .nk-tb-item  -->
                                                      @endforeach
                                                    @endif
                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
                                  </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner-sm border-top text-center d-sm-none">
                                    <a href="#" class="btn btn-link btn-block">See History</a>
                                </div><!-- .card-inner -->
                            </div><!-- .card -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->

<!-- Modal Alert -->
<div class="modal fade" tabindex="-1" id="modalDepositBalance">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
            <div class="modal-body modal-body-lg text-center">
                <div class="nk-modal">
                    <em class="nk-modal-icon icon icon-circle icon-circle-lg ni ni-coins bg-success"></em>
                    <h4 class="nk-modal-title">Deposit balance</h4>
                    <div class="nk-modal-text">
                        <div class="caption-text">Enter amount of USD to deposit</div>
                        <span class="sub-text-sm">Minimum amount to deposit:<br>
                          * 25 USD for Bitcoin payments<br>
                          * 5 USD for payments with other coins</span>
                    </div>
                    <form action="{{ route('dashboard.CoinbaseCreatePayment') }}" class="form-validate is-alter">
                        @csrf
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="site-name">Amount to deposit</label>
                                    <span class="form-note"></span>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="number" id="usd" name="usd" class="form-control text-left" value="5" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="site-name">Coin for payment</label>
                                    <span class="form-note"></span>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select class="form-control" id="coin" name="coin" onchange="chooseCoinForPayment()">
                                          <option value="BTC">Bitcoin (BTC)</option>
                                          <option value="BCH" selected>Bitcoin Cash (BCH)</option>
                                          <option value="DAI">Dai (DAI)</option>
                                          <option value="‎ETH">Ethereum (‎ETH)</option>
                                          <option value="LTC">Litecoin (LTC)</option>
                                          <option value="USDC">USD Coin (USDC)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nk-modal-action">
                            <button type="submit" class="btn btn-lg btn-mw btn-primary">Next</button>
                        </div>
                    </form>

                </div>
            </div><!-- .modal-body -->
            <div class="modal-footer bg-lighter">
                <div class="text-center w-100">
                    <p>The balance of Coinpilot is not your trading fund.<br>It is for paying invoices, not for trading!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function chooseCoinForPayment() {
    coin = document.getElementById("coin").value;
    current_usd = document.getElementById("usd").value;
    if(coin == 'BTC') {
        if(current_usd < 25) {
          document.getElementById("usd").value = "25";
        }
    } else {
        if(current_usd < 5) {
          document.getElementById("usd").value = "5";
        }
    }
}
</script>

@endsection
