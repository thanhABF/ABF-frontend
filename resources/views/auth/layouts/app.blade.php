<html lang="en">
<head>
<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="acff7d4d-baaf-4b99-99ba-4b3f694f19fd";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
    @include('auth.layouts.partials._head')
    @include('dashboard.layouts.partials._style')
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=2.1.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=2.1.0') }}">
    <style>
        p, .text-sm:not(label), .mt-4, .font-semibold, .text-xs, .user-info, .dark-switch, .sign-out {
            font-family: 'Roboto', sans-serif !important;
            @if(Cookie::get('dark_mode') == '1')
            color: #8094ae !important;
            @endif
        }
        h1, h2, h3, h4, h5, h6, label, .text-lg {
            font-family: 'Nunito', sans-serif !important;
            font-weight: 700 !important;
            @if(Cookie::get('dark_mode') == '1')
            color: white !important;
            @endif
        }
        nav {
            display: none !important;
        }
        .nk-header {
            z-index: 5;
        }
        .dark-mode-auth > .nk-content {
            background-color: #0D141D;
        }
        @if(Cookie::get('dark_mode') == '1')
        .bg-white, .bg-gray-50, .bg-gray-100 {
            background-color: #101924 !important;
            border-color: #384D69 !important;
        }
        .bg-lighter, .dropdown-menu {
            border-color: #384D69 !important;
        }
        .dropdown-inner {
            background-color: #18212D !important;
            border-color: #384D69 !important;
        }
        .text-white, .lead-text {
            color: white !important;
        }
        input {
            background-color: #141C26 !important;
            border-color: #384D69 !important;
            color: white;
        }
        .border {
            border-color: transparent !important;
        }
        input:focus {
            border-color: #6576ff !important;
            outline: 0 !important;
            box-shadow: 0 0 0 3px rgba(101, 118, 255, 0.1) !important;
        }
        @endif
        .fa {
            font-family: "Font Awesome 5 Brands" !important;
        }
        .fa.fa-eye, .fa.fa-eye-slash {
            font-family: "Font Awesome 5 Free" !important;
            font-weight: 400;
        }
        ::-webkit-scrollbar {
            width: 0px;
        }
    </style>
</head>
<body style="overflow:auto;" class="nk-body bg-lighter npc-general has-sidebar">
    @yield('content')
    @include('auth.layouts.partials._scripts')
</body>
</html>
