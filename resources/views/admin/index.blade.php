@extends('admin.layouts.app')
@section('content')
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Users</h3>
                            <div class="nk-block-des text-soft">
                                <p>The list of Users</p>
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
                                            <h6 class="title">Users</h6>
                                            <p>The list of all users</p>
                                        </div>
                                        <div class="card-tools shrink-0 d-none d-sm-block">
                                            <ul class="nav nav-switch-s2 nav-tabs bg-white">
                                                <!--<li class="nav-item"><a href="#" class="nav-link active">Closed positions</a></li>-->
                                                <!--<li class="nav-item"><a href="#" class="nav-link">Open positions</a></li>-->
                                            </ul>
                                        </div>
                                    </div>


                                    <div class="" style="width:100%;overflow:auto;">
                                        <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                            <thead>
                                                <tr class="nk-tb-item nk-tb-head">
                                                    <th class="nk-tb-col"><span class="sub-text">ID</span></th>
                                                    <th class="nk-tb-col"><span class="sub-text">Email</span></th>
                                                    <th class="nk-tb-col"><span class="sub-text">Verified</span></th>
                                                    <th class="nk-tb-col"><span class="sub-text">Registered</span></th>
                                                    <th class="nk-tb-col"><span class="sub-text">Exchange API</span></th>
                                                    <th class="nk-tb-col"><span class="sub-text">Made payments</span></th>
                                                    <th class="nk-tb-col"><span class="sub-text">Balance</span></th>
                                                    <th class="nk-tb-col"><span class="sub-text">Unpaid commission</span></th>
                                                    <th class="nk-tb-col"><span class="sub-text">Commission rate</span></th>
                                                    <th class="nk-tb-col"><span class="sub-text">Who invited</span></th>
                                                    <th class="nk-tb-col"><span class="sub-text">Action</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($users_return as $user)
                                                <tr class="nk-tb-item">
                                                    <td class="nk-tb-col">
                                                        <span>{{ $user['id'] }}</span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span>{{ $user['email'] }}</span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span>{{ $user['verified'] }}</span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span>{{ $user['registered'] }}</span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                      @if($user['exchange_status'] == 'connected')
                                                          <span class="text-success">Connected</span>
                                                      @else
                                                          <span class="text-warning">No</span>
                                                      @endif
                                                    </td>
                                                    <td class="nk-tb-col">
                                                      @if($user['made_payments'] == 'Yes')
                                                          <span class="text-success">Yes</span>
                                                      @else
                                                          <span class="text-warning">No</span>
                                                      @endif

                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span>{{ $user['balance'] }}</span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span>{{ $user['unpaid_commission'] }}</span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span>{{ $user['commission_rate'] }}%</span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                      @if(!empty($user['invited_by_user_id']))
                                                        <span>User #{{ $user['invited_by_user_id'] }}</span>
                                                      @endif
                                                    </td>
                                                    <td class="nk-tb-col">
                                                      <a href="{{ route('admin.user', $user['id']) }}" class="btn btn-sm btn-primary">Manage</a>
                                                      @if($user['verified'] == 'Yes')
                                                          <a href="{{ route('admin.impersonate', $user['id']) }}" class="btn btn-sm btn-primary">Impersonate</a>
                                                      @endif
                                                    </td>
                                                </tr><!-- .nk-tb-item  -->
                                              @endforeach
                                            </tbody>
                                        </table>
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
