@extends('dashboard.layouts.app')
@section('content')
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">

                    @if (session('error'))
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="alert alert-danger alert-icon alert-dismissible">
                                    <em class="icon ni ni-cross-circle"></em> <strong>{{ session('error') }}</strong><button class="close" data-dismiss="alert"></button>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="alert alert-success alert-icon alert-dismissible">
                                    <em class="icon ni ni-cross-circle"></em> <strong>{{ session('success') }}</strong><button class="close" data-dismiss="alert"></button>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Referral program</h3>
                            <div class="nk-block-des text-soft">
                                <p></p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTransferBalance"><em class="icon ni ni-reports"></em><span>Transfer referral balance</span></button></li>
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
                                            <p>Base info</p>
                                        </div>
                                    </div><!-- .card-title-group -->
                                    <div class="nk-order-ovwg">
                                        <div class="row g-4 align-end">
                                            <div class="col-xxl-12">
                                                <div class="row g-4">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="nk-order-ovwg-data buy">
                                                            <div class="amount">{{ number_format($balance_referral, 2, '.', '') }} <small class="currenct currency-usd">USD</small></div>
                                                            <div class="title"><em class="icon ni ni-arrow-down-left"></em> Referral balance</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-lg-6">
                                                        <div class="nk-order-ovwg-data sell">
                                                            <div class="amount">{{ $invited_users }} <small class="currenct currency-usd"></small></div>
                                                            <div class="title"><em class="icon ni ni-user"></em> Invited users</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-lg-6">
                                                        <div class="nk-order-ovwg-data sell">
                                                            <div class="amount">{{ $invited_active_users }} <small class="currenct currency-usd"></small></div>
                                                            <div class="title"><em class="icon ni ni-user-check"></em> Active users</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-lg-6">
                                                        <div class="nk-order-ovwg-data sell">
                                                            <div class="amount">{{ $referral_level }} <small class="currenct currency-usd"></small></div>
                                                            <div class="title"><em class="icon ni ni-network"></em> Tier</div>
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
                                          <a href="#" data-toggle="modal" data-target="#modalReferralLink">
                                            <div class="nk-wg-action-content">
                                                <em class="icon ni ni-link-alt"></em>
                                                <div class="title">Get your referral link</div>
                                                <p>Create your referral link, share it and start to earn.</p>
                                            </div>
                                            </a>
                                            <a href="#" class="btn btn-icon btn-trigger mr-n2" data-toggle="modal" data-target="#modalReferralLink"><em class="icon ni ni-forward-ios"></em></a>
                                        </div>
                                    </div><!-- .card-inner -->
                                    <div class="card-inner">
                                        <div class="nk-wg-action">
                                          <a href="#" data-toggle="modal" data-target="#modalTransferBalance">
                                            <div class="nk-wg-action-content">
                                                <em class="icon ni ni-cc-alt-fill"></em>
                                                <div class="title">Transfer referral balance</div>
                                                <p>Transfer your referral balance to pay Coinpilot invoices or withdraw to your wallet.</p>
                                            </div>
                                            </a>
                                            <a href="#" class="btn btn-icon btn-trigger mr-n2" data-toggle="modal" data-target="#modalTransferBalance"><em class="icon ni ni-forward-ios"></em></a>
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
                                                    <a class="nav-link active" data-toggle="tab" href="#tabWithdrawal">Withdrawal</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" data-toggle="tab" href="#tabEarnings">Earnings</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner p-0 border-top">
                                  <div class="tab-content">
                                      <div class="tab-pane active" id="tabWithdrawal">
                                          <div class="p-3">
                                              <table class="datatable-init nk-tb-list nk-tb-ulist invoiceTable" data-auto-responsive="true">
                                                  <thead>
                                                      <tr class="nk-tb-item nk-tb-head">
                                                          <th class="nk-tb-col"><span class="sub-text">Date</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Amount</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Target</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Wallet</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @if(!empty($withdrawal))
                                                      @foreach($withdrawal as $w)
                                                          <tr class="nk-tb-item">
                                                              <td class="nk-tb-col">
                                                                  <span>{{ $w->created_at }}</span>
                                                              </td>
                                                              <td class="nk-tb-col">
                                                                  <span>{{ $w->amount }} {{ $w->currency }}</span>
                                                              </td>
                                                              <td class="nk-tb-col">
                                                                @if($w->target == 'coinpilot')
                                                                  <span>Coinpilot balance</span>
                                                                @elseif($w->target == 'wallet')
                                                                  <span>Wallet</span>
                                                                @endif
                                                              </td>
                                                              <td class="nk-tb-col">
                                                                  <span>{{ $w->wallet }}</span>
                                                              </td>
                                                              <td class="nk-tb-col">
                                                                @if($w->status == 'success')
                                                                  <span class="tb-status text-success">Success</span>
                                                                @elseif($w->status == 'queue')
                                                                  <span class="tb-status text-warning">Queue</span>
                                                                @endif
                                                              </td>
                                                          </tr><!-- .nk-tb-item  -->
                                                        @endforeach
                                                      @endif

                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
                                      <div class="tab-pane" id="tabEarnings">
                                          <div class="p-3">
                                              <table class="datatable-init nk-tb-list nk-tb-ulist invoiceTable" data-auto-responsive="true">
                                                  <thead>
                                                      <tr class="nk-tb-item nk-tb-head">
                                                          <th class="nk-tb-col"><span class="sub-text">Date</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Amount</span></th>
                                                          <th class="nk-tb-col"><span class="sub-text">Commission rate</span></th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @if(!empty($withdrawal))
                                                        @foreach($withdrawal as $w)
                                                            <tr class="nk-tb-item">
                                                                <td class="nk-tb-col">
                                                                    <span>2021-01-01</span>
                                                                </td>
                                                                <td class="nk-tb-col">
                                                                    <span>10 USD</span>
                                                                </td>
                                                                <td class="nk-tb-col">
                                                                  <span>2.5%</span>
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


                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card card-bordered">
                                <div class="card-inner card-inner-xl">
                                    <article class="entry">
                                        <h3>We are offering the most ambitious referral program!</h3>
                                        <h5 class="mt-2">Earn limitless income marketing for us!</h5>
                                        <p class="mt-3">All referrals will reward you with <b>100%</b> of their first week invoice. This invoice will vary greatly on account size. </p>
                                        <p>(Note- A referral is counted when they begin trading, <b>not</b> when they sign up)</p>
                                        <p>Following referrals, there will be a tier progression for increased reward:</p>
                                        <p>
                                          <b>Tier 1</b>-(3 referrals): $20 credited to your account to cover Coinpilot commission<br>
                                          <b>Tier 2</b>-(5 referrals): Commission percentage will be reduced to 15%<br>
                                          <b>Tier 3</b>-(10 referrals): Enables permanent 2.5% commission from all referrals<br>
                                          <b>Tier 4</b>-(25 referrals): Enables permanent 5% commission from all referrals<br>
                                          <b>Tier 5</b>-(50 referrals): Enables permanent 10% commission from all referrals
                                        </p>
                                        <p>Commission is calculated based on the 20% Coinpilot invoice. Example~ Tier 5: 10% referrer, 10% Coinpilot.</p>
                                        <p>Create your custom referral link and begin earning today!</p>
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalReferralLink"><em class="icon ni ni-link-alt"></em>&nbsp;Get your referral link</button>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->

<!-- Modal Alert -->
<div class="modal fade" tabindex="-1" id="modalReferralLink">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
            <div class="modal-body modal-body-lg text-center">
                <div class="nk-modal">
                    <em class="nk-modal-icon icon icon-circle icon-circle-lg ni ni-link-alt bg-success"></em>
                    <h4 class="nk-modal-title">Referral link</h4>
                    <div class="nk-modal-text">
                      @if(!empty($referral_link))
                        <div class="caption-text">Your referral link:<br><a href="https://coinpilot.com/r/{{ $referral_link }}" target="_blank">https://coinpilot.com/r/{{ $referral_link }}</a></div>
                      @else
                        <div class="caption-text">Create your refferal link using the form below</div>
                      @endif
                    </div>
                    <div id="status_referral" class="col-12 mb-2"></div>
                    <form action="{{ route('dashboard.referral_link_save') }}" method="POST" enctype="multipart/form-data" class="form-validate is-alter">
                        @csrf
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="site-name">coinpilot.com/r/</label>
                                    <span class="form-note"></span>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="referral_link" name="referral_link" value="" placeholder="Enter your unique referral link" onkeyup="chechReferralLink();">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="nk-modal-action">
                            <button type="submit" id="referral_button" class="btn btn-lg btn-mw btn-primary" disabled>Save</button>
                        </div>
                    </form>

                </div>
            </div><!-- .modal-body -->
            <!--
            <div class="modal-footer bg-lighter">
                <div class="text-center w-100">
                    <p>Earn upto $0 for each friend your refer! <a href="#">Invite friends</a></p>
                </div>
            </div>
            -->
        </div>
    </div>
</div>

<!-- Modal Tabs -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalTransferBalance">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h4 class="title">Transfer referral balance</h4>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabItem1">To Coinpilot balance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabItem2">Withdrawal to your wallet</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tabItem1">
                        <h6 class="title"></h6>
                        <form action="{{ route('dashboard.transfer_referral_balance') }}" method="POST" enctype="multipart/form-data" class="form-validate is-alter">
                            @csrf
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="site-name">Amount, USD</label>
                                        <span class="form-note">Amount for transfer</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" name="amount" value="" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-modal-action">
                                <button type="submit" class="btn btn-lg btn-mw btn-primary">Transfer</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tabItem2">
                        <h6 class="title"></h6>
                        <form action="{{ route('dashboard.withdrawal_referral_balance') }}" method="POST" enctype="multipart/form-data" class="form-validate is-alter">
                            @csrf
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="site-name">Amount, USD</label>
                                        <span class="form-note">Amount for transfer</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" name="amount">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="site-name">Currency</label>
                                        <span class="form-note">Choose the currency</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <select class="form-control" name="currency">
                                                <option value="USDT" selected>USDT (Tether)</option>
                                                <option value="USDC">USDC (USD Coin)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="site-name">Wallet address</label>
                                        <span class="form-note">Enter your wallet address</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="wallet">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-modal-action">
                                <button type="submit" class="btn btn-lg btn-mw btn-primary">Withdrawal</button>
                            </div>
                        </form>
                        <div class="card-title pt-1">
                          <p>* This amount doesn't include the network commissions.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- .modal -->
<!-- Modal Alert -->

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">
function replaceSymbolForLink(values) {
  var values = values.replace('!', '');
  var values = values.replace('@', '');
  var values = values.replace('#', '');
  var values = values.replace('$', '');
  var values = values.replace('%', '');
  var values = values.replace('^', '');
  var values = values.replace('&', '');
  var values = values.replace('*', '');
  var values = values.replace('(', '');
  var values = values.replace(')', '');
  var values = values.replace('+', '');
  var values = values.replace('=', '');
  var values = values.replace('[', '');
  var values = values.replace(']', '');
  var values = values.replace('{', '');
  var values = values.replace('}', '');
  var values = values.replace(':', '');
  var values = values.replace(';', '');
  var values = values.replace('"', '');
  var values = values.replace("'", '');
  var values = values.replace('/', '');
  var values = values.replace('.', '');
  var values = values.replace(',', '');
  var values = values.replace('?', '');
  var values = values.replace(' ', '');
  return values;
}

function chechReferralLink() {
  if (this.timer) {
      clearTimeout(this.timer);
      this.timer = null;
  }

  document.getElementById("referral_button").disabled = true; //Make the button disabled
  var referral_link = document.getElementById('referral_link').value;
  var referral_link = replaceSymbolForLink(referral_link);
  document.getElementById("referral_link").value = referral_link;

  if(referral_link.length == 0) {
    document.getElementById("status_referral").innerHTML = ''; //Clear the status
  } else {
    document.getElementById("status_referral").innerHTML = '<div class="spinner-grow" role="status"><span class="sr-only">Loading...</span></div>'; //Clear the status
    this.timer = setTimeout(() => {
        axios.get('https://coinpilot.com/dashboard/referral_link_duplicates/'+referral_link).then((response) => {
            if(response.data == 'ok') {
              document.getElementById("referral_button").disabled = false;
              document.getElementById("status_referral").innerHTML = '<span class="sub-text-sm text-success">You can use this referral link</span>';
            } else {
              document.getElementById("referral_button").disabled = true;
              document.getElementById("status_referral").innerHTML = '<span class="sub-text-sm text-danger">This referral link already contains in the database</span>';
            }
        });
    }, 2000);
  }
}
</script>

@endsection
