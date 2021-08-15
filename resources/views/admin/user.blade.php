@extends('admin.layouts.app')
@section('content')
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
              <div class="nk-block-head nk-block-head-sm">

                    @if (session('success'))
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="alert alert-success alert-icon alert-dismissible">
                                    <em class="icon ni ni-cross-circle"></em> <strong>{{ session('success') }}</strong><button class="close" data-dismiss="alert"></button>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="alert alert-danger alert-icon alert-dismissible">
                                    <em class="icon ni ni-cross-circle"></em> <strong>{{ session('error') }}</strong><button class="close" data-dismiss="alert"></button>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">User / <strong class="text-primary small">{{ $user_return['first_name'] }} {{ $user_return['last_name'] }}</strong></h3>
                            <div class="nk-block-des text-soft">
                                <ul class="list-inline">
                                    <li>User ID: <span class="text-base">{{ $user_return['id'] }}</span></li>
                                    <li>Registered At: <span class="text-base">{{ $user_return['registered'] }}</span></li>
                                    <li>Email: <span class="text-base">{{ $user_return['verified'] }}</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a href="{{ route('admin.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                            <a href="{{ route('admin.index') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row gy-5">
                        <div class="col-lg-6">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title title">User Information</h5>
                                    <p>Basic info</p>
                                </div>
                            </div>
                            <div class="card card-bordered">
                                <ul class="data-list is-compact">
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">First Name</div>
                                            <div class="data-value">{{ $user_return['first_name'] }}</div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Last Name</div>
                                            <div class="data-value">{{ $user_return['last_name'] }}</div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Email Address</div>
                                            <div class="data-value">{{ $user_return['email'] }}</div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Commission rate</div>
                                            <div class="data-value">{{ $user_return['commission_rate'] }}% <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalCommissionRate">edit</button> </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-6">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title title">Exchange status</h5>
                                    <p>Basic info about exchange</p>
                                </div>
                            </div>
                            <div class="card card-bordered">
                                <ul class="data-list is-compact">
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Status</div>
                                            <div class="data-value">
                                                @if($user_return['exchange_status'] == 'connected')
                                                    <span class="text-success">Connected</span>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Total balance in BTC</div>
                                            <div class="data-value"> BTC</div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Total balance in USDT</div>
                                            <div class="data-value"> USDT</div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Amount of exchanges</div>
                                            <div class="data-value">{{ $user_return['amount_exchanges'] }}</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .col -->
                    </div><!-- .row -->

                    <div class="row gy-5">
                        <div class="col-lg-6">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title title">Balance</h5>
                                    <p>Basic info</p>
                                </div>
                            </div>
                            <div class="card card-bordered">
                                <ul class="data-list is-compact">
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Balance</div>
                                            <div class="data-value">{{ $user_return['balance'] }} USD <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalBalance">edit</button></div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Unpaid commission</div>
                                            <div class="data-value">{{ $user_return['unpaid_commission'] }} USD</div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Made payments</div>
                                            <div class="data-value">
                                              @if($user_return['made_payments'] == 'Yes')
                                                  <span class="text-success">Yes</span>
                                              @else
                                                  <span class="text-warning">No</span>
                                              @endif
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-6">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title title">Referral program</h5>
                                    <p>Basic info about exchange</p>
                                </div>
                            </div>
                            <div class="card card-bordered">
                                <ul class="data-list is-compact">
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Referral balance</div>
                                            <div class="data-value">{{ $user_return['balance_referral'] }} USD</div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Invited users</div>
                                            <div class="data-value">{{ $user_return['invited_users'] }}</div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Invited active users</div>
                                            <div class="data-value">{{ $user_return['invited_active_users'] }}</div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Tier</div>
                                            <div class="data-value">{{ $user_return['referral_level'] }}</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .col -->
                    </div><!-- .row -->

                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->

<!-- Modal Tabs -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalBalance">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h4 class="title">Top-up the balance for this user</h4>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabGiveBonus">Give bonus</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tabGiveBonus">
                        <h6 class="title"></h6>
                        <form action="{{ route('admin.topup_user_balance') }}" method="POST" enctype="multipart/form-data" class="form-validate is-alter">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user_return['id'] }}">
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
                </div>
            </div>
        </div>
    </div>
</div> <!-- .modal -->
<!-- Modal Alert -->
<!-- Modal Tabs -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalCommissionRate">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h4 class="title">Commission rate</h4>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabCommissionRate">Change rate</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tabCommissionRate">
                        <h6 class="title"></h6>
                        <form action="{{ route('admin.user_commission_rate') }}" method="POST" enctype="multipart/form-data" class="form-validate is-alter">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user_return['id'] }}">
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="site-name">Commission Rate, %</label>
                                        <span class="form-note"></span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" name="commission_rate" value="" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-modal-action">
                                <button type="submit" class="btn btn-lg btn-mw btn-primary">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- .modal -->
<!-- Modal Alert -->

@endsection
