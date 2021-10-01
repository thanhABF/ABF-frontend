<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="acff7d4d-baaf-4b99-99ba-4b3f694f19fd";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

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
