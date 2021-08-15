<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    @include('admin.layouts.partials._head')
</head>

<body class="nk-body bg-lighter npc-general has-sidebar @if(Cookie::get('dark_mode') == '1') dark-mode @endif">
  <div class="nk-app-root">
      <!-- main @s -->
      <div class="nk-main ">
          @include('admin.layouts.partials.sidebar')

          <!-- wrap @s -->
          <div class="nk-wrap ">
            @include('admin.layouts.partials.header')
            @yield('content')
            @include('admin.layouts.partials.footer')
          </div>
          <!-- wrap @e -->
      </div>
      <!-- main @e -->
    </div>
    <!-- app-root @e -->

    @include('admin.layouts.partials._scripts')
</body>
</html>
