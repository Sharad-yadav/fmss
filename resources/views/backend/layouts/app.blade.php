<!DOCTYPE html>

<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

<!-- begin::Head -->
<head>

    <!--begin::Base Path (base relative path for assets of this page) -->
    <base href="../">

    <!--end::Base Path -->
    <meta charset="utf-8" />
    <title>FSM | Dashboard </title>
    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>

    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Fonts -->
    <!--Additional Vendors-->
    <link href="{{ asset('assets/admin/css') }}/datatable.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css') }}/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
    <!--End Additional Vendors-->



    <!--begin:: Global Mandatory Vendors -->
    <link href="{{ asset('assets/admin/css') }}/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

    <!--end:: Global Mandatory Vendors -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('assets/admin/css') }}/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css') }}/style.css" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ asset('assets/admin/css') }}/base-light.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css') }}/menu-light.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css') }}/brand-dark.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css') }}/aside-dark.css" rel="stylesheet" type="text/css" />

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/media') }}/logos/favicon.ico" />
    @stack('style')
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="demo1/index.html">
            <img alt="Logo" src="./assets/media/logos/logo-light.png" />
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
    </div>
</div>

<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

        @include('backend.layouts.sidebar')
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

            @include('backend.layouts.header')
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

               @include('backend.layouts.header-content')

                <!-- begin:: Content -->
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                    @yield('content')
                </div>

                <!-- end:: Content -->
            </div>
            @include('sweetalert::alert')

            <!-- begin:: Footer -->
                @include('backend.layouts.footer')
            <!-- end:: Footer -->
        </div>
    </div>
</div>

<!-- end:: Page -->

<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>

<!-- end::Scrolltop -->

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>

<!-- end::Global Config -->

<!--begin:: Global Mandatory Vendors -->
<link href="{{ asset('assets/admin/css') }}/full-calendar.css" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/admin/js') }}/jquery.js" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js') }}/popper.js" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js') }}/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js') }}/js.cookie.js" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js') }}/moment.min.js" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js') }}/tooltip.min.js" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js') }}/perfect-scrollbar.js" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js') }}/sticky.min.js" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js') }}/wNumb.js" type="text/javascript"></script>

<!--end:: Global Mandatory Vendors -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{ asset('assets/admin/js') }}/scripts.bundle.js" type="text/javascript"></script>
<!--Additional Vendors-->
<script src="{{ asset('assets/admin/js') }}/datatable.bundle.js" type="text/javascript"></script>
<!--End Additional Vendors-->

@stack('scripts')
<!--end::Global Theme Bundle -->

</body>

<!-- end::Body -->
</html>
