<!-- sidebar @s -->
<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{ route('dashboard.index') }}" class="logo-link nk-sidebar-logo">
                <!--<img class="logo-light logo-img" src="{{ asset('images/logo.png') }}" srcset="{{ asset('images/logo2x.png 2x') }}" alt="logo">
                <img class="logo-dark logo-img" src="{{ asset('images/logo-dark.png') }}" srcset="{{ asset('images/logo-dark2x.png 2x') }}" alt="logo-dark">-->

                <img class="logo-light logo-img" src="{{ asset('images/logo.png') }}" srcset="{{ asset('images/logo.png') }}" style="width:70%;opacity:0.95;" alt="logo">
                <!--<img class="logo-light logo-img" src="{{ asset('assets-welcome/images/logo.svg') }}" srcset="{{ asset('assets-welcome/images/logo.svg') }}" style="width:70%;opacity:0.95;" alt="logo">-->
                <!--<img class="logo-dark logo-img" src="{{ asset('assets-welcome/images/logo.svg') }}" srcset="{{ asset('assets-welcome/images/logo.svg') }}" style="width:70%;opacity:0.95;" alt="logo-dark">-->
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{ route('admin.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-speed"></em></span>
                            <span class="nk-menu-text">Admin</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Contacts</h6>
                    </li><!-- .nk-menu-heading -->

                    <li class="nk-menu-item has-sub">
                      <a href="https://discord.gg/ftvaDxYRwb" target="_blank" class="pb-0 nk-menu-link"><i class="fab fa-discord" aria-hidden="true"></i>&#160;<small>Discord</small></a>
                      <a href="mailto:support@coinpilot.com" class="pt-0 nk-menu-link"><small>support@coinpilot.com</small></a>
                    </li>



                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
<!-- sidebar @e -->
