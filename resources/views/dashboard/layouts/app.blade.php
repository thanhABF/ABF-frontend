<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    @include('dashboard.layouts.partials._head')
    @include('dashboard.layouts.partials._style')
</head>

<body class="nk-body bg-lighter npc-general has-sidebar @if(Cookie::get('dark_mode') == '1') dark-mode @endif">
  <div class="nk-app-root">
      <!-- main @s -->
      <div class="nk-main ">
          @include('dashboard.layouts.partials.sidebar')

          <!-- wrap @s -->
          <div class="nk-wrap ">
            @include('dashboard.layouts.partials.header')

            @yield('content')
            @include('dashboard.layouts.partials.footer')
          </div>
          <!-- wrap @e -->
      </div>
      <!-- main @e -->
    </div>
    <!-- app-root @e -->

    @include('dashboard.layouts.partials._scripts')
</body>
</html>
