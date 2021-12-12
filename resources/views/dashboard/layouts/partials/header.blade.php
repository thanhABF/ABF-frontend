<!-- main header @s -->
<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="{{ route('dashboard.index') }}" class="logo-link">
                    <!--<img class="logo-light logo-img" src="{{ asset('images/logo.png') }}" srcset="{{ asset('images/logo2x.png 2x') }}" alt="logo">
                    <img class="logo-dark logo-img" src="{{ asset('images/logo-dark.png') }}" srcset="{{ asset('images/logo-dark2x.png 2x') }}" alt="logo-dark">-->
                    @if(Cookie::get('dark_mode') == '1')
                        <img class="logo-light logo-img" src="{{ asset('assets-welcome/images/logo.svg') }}" srcset="{{ asset('images/logo.png') }}" style="width:70%; opacity:1;" alt="logo">
                    @else
                        <img class="logo-dark logo-img" src="{{ asset('assets-welcome/images/logo-black.png') }}" srcset="{{ asset('assets-welcome/images/logo-black.png') }}" style="width:70%; opacity:0.9;" alt="logo-dark">
                    @endif
                    <!--<img class="logo-light logo-img" src="{{ asset('assets-welcome/images/logo.svg') }}" srcset="{{ asset('assets-welcome/images/logo.svg') }}" style="width:80%; opacity:0.9;" alt="logo">-->
                    <!--<img class="logo-dark logo-img" src="{{ asset('assets-welcome/images/logo-black.png') }}" srcset="{{ asset('assets-welcome/images/logo-black.png') }}" style="width:80%; opacity:0.9;" alt="logo-dark">-->
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-news d-none d-xl-block">
                <div class="nk-news-list">
                  <div class="row">
                      @if(!empty(Cookie::get('imp')) and Cookie::get('imp') == auth()->user()->id)
                          <div class="col">
                            <div class="alert alert-light alert-icon" style="width:100%;">
                                <em class="icon ni ni-alert-circle"></em> <strong>"Impersonate"</strong>. Click&nbsp;<a href="{{ route('admin.leaveImpersonation') }}" class="alert-link">here</a>&nbsp;to log out.
                            </div>
                          </div>
                      @endif

                      @if((float)$balance < 0)
                          <div class="col">
                              <div class="alert alert-fill alert-warning alert-icon">
                                  <em class="icon ni ni-alert-circle"></em> <strong>Not enough balance</strong>. Please <a href="{{ route('dashboard.invoices') }}" class="alert-link">top-up the balance</a> to continue use of our service
                              </div>
                          </div>
                      @endif
                    </div>

                    <a class="nk-news-item" href="#">
                        <!--
                        <div class="nk-news-icon">
                            <em class="icon ni ni-card-view"></em>
                        </div>
                        <div class="nk-news-text">
                            <p>Do you know the latest update of 2019? <span> A overview of our is now available on YouTube</span></p>
                            <em class="icon ni ni-external"></em>
                        </div>
                        -->
                    </a>
                </div>
            </div><!-- .nk-header-news -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                                <div class="user-info d-none d-md-block">
                                    <div class="user-status">Verified</div>
                                    <div class="user-name dropdown-indicator">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <em class="icon ni ni-user-alt"></em>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                                        <span class="sub-text">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <!--
                                    <li><a href="html/user-profile-regular.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                    <li><a href="html/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                    <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                    -->
                                    <li><a class="dark-switch @if(Cookie::get('dark_mode') == '1') active @endif" href="{{ route('dark_mode') }}"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><!--<a href="#"><em class="icon ni ni-signout"></em><span>Sign out</span></a>-->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="/user/profile"><span>Profile</span></a>
                                    </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><!--<a href="#"><em class="icon ni ni-signout"></em><span>Sign out</span></a>-->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="#"><span>Connect to Discord</span></a>
                                    </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><!--<a href="#"><em class="icon ni ni-signout"></em><span>Sign out</span></a>-->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"><em class="icon ni ni-signout"></em><span>Sign out</span></a>
                                    </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li><!-- .dropdown -->
                    <!--
                    <li class="dropdown notification-dropdown mr-n1">
                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-head">
                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                <a href="#">Mark All as Read</a>
                            </div>
                            <div class="dropdown-body">
                                <div class="nk-notification">
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                </div><!-- .nk-notification --
                            </div><!-- .nk-dropdown-body --
                            <div class="dropdown-foot center">
                                <a href="#">View All</a>
                            </div>
                        </div>
                    </li><-- .dropdown --
                    -->
                </ul><!-- .nk-quick-nav -->
            </div><!-- .nk-header-tools -->
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>
<!-- main header @e -->
