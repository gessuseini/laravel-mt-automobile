<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ $globalSettings->website_icon }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $globalSettings->website_name }}</title>

    <!--slider revolution-->
    <link rel="stylesheet" type="text/css" href="{{ asset('rs-plugin/css/settings.css')}}" media="screen" />

    <link href="{{ asset('assets/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/animations.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/jquery-qtip.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/odometer-theme-default.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/superfish.css') }}" rel="stylesheet">

    <link href="{{ asset('fonts/streamline-small/style.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/template/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/social/styles.css') }}" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,600,700,800"
        rel="stylesheet"
        type="text/css"
    />

    {{--        <link rel="preconnect" href="https://fonts.googleapis.com">--}}
    {{--        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
    {{--        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">--}}


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        .header h1 a {
            color: <?php echo $globalSettings->website_theme_color ?>;
        }
        .more {
            background: <?php echo $globalSettings->website_theme_color ?> !important;
        }
        .revolution-slider .hexagon
        {
            background: <?php echo $globalSettings->website_theme_color ?>;
        }
        .hexagon
        {
            border-left: solid 2px <?php echo $globalSettings->website_theme_color ?>;
            border-right: solid 2px <?php echo $globalSettings->website_theme_color ?>;
        }
        .hexagon:before {
            border-top: solid 2.8284px <?php echo $globalSettings->website_theme_color ?>;
            border-right: solid 2.8284px <?php echo $globalSettings->website_theme_color ?>;
        }
        .hexagon:after {
            border-bottom: solid 2.8284px <?php echo $globalSettings->website_theme_color ?>;
            border-left: solid 2.8284px <?php echo $globalSettings->website_theme_color ?>;
        }
        .hexagon div:before {
            color: <?php echo $globalSettings->website_theme_color ?>;
        }
        .box-header:after {
            background: <?php echo $globalSettings->website_theme_color ?>;
        }
        li.template-bullet:before {
            color: <?php echo $globalSettings->website_theme_color ?>;
        }
        .features-list li .icon:before {
            color: <?php echo $globalSettings->website_theme_color ?>;
        }
        .accordion .ui-accordion-header .ui-accordion-header-icon {
            color: <?php echo $globalSettings->website_theme_color ?>;
        }
        .cs-carousel-pagination a.selected, .cs-carousel-pagination a:hover {
            border-color: <?php echo $globalSettings->website_theme_color ?>;
        }
        .services-list li .service-icon::before {
            color: <?php echo $globalSettings->website_theme_color ?>;
        }
        .bread-crumb li:last-child {
            color: <?php echo $globalSettings->website_theme_color ?>;
        }
        .cost-calculator-box input[type="checkbox"]:checked+.checkbox-label .checkbox-box
        {
            background: <?php echo $globalSettings->website_theme_color ?>;
            border-color: <?php echo $globalSettings->website_theme_color ?>;
        }
        {{--.footer-row h6.box-header:after {--}}
        {{--    background: <?php echo $globalSettings->website_theme_color ?>;--}}
        {{--}--}}
        {{--.footer-row li.template-bullet:before {--}}
        {{--    color: <?php echo $globalSettings->website_theme_color ?>;--}}
        {{--}--}}
        {{--.social-icons.gray li a:before {--}}
        {{--    color: <?php echo $globalSettings->website_theme_color ?>;--}}
        {{--}--}}
        {{--.social-icons.gray li {--}}
        {{--    border: 1px solid <?php echo $globalSettings->website_theme_color ?>;--}}
        {{--}--}}
        {{--.social-icons.gray a:hover--}}
        {{--{--}}
        {{--    color: <?php echo $globalSettings->website_theme_color ?>;--}}
        {{--}--}}
        {{--.social-icons.gray li:hover {--}}
        {{--    border: 1px solid <?php echo $globalSettings->website_theme_color ?>;--}}
        {{--}--}}
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="site-container">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white">
            {{ $header }}
        </header>
    @endif

    <!-- Page Content -->
    <div class="site-container">
        <main>
            {{ $slot }}
        </main>

    </div>
    @include('layouts.footer')
    <!-- Page Footer -->
    @if (isset($footer))
        <footer class="bg-white">
            {{ $footer }}
        </footer>
    @endif
</div>
<a href="#top" class="scroll-top animated-element template-arrow-up" title="Scroll to top"></a>
<div class="background-overlay"></div>
<!--js-->
<script type="text/javascript" src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<!--slider revolution-->
<script
    type="text/javascript"
    src="{{ asset('rs-plugin/js/jquery.themepunch.tools.min.js') }}"
></script>
<script
    type="text/javascript"
    src="{{ asset('rs-plugin/js/jquery.themepunch.revolution.min.js') }}"
></script>
<script type="text/javascript" src="{{ asset('js/jquery.ba-bbq.min.js') }}"></script>
<script
    type="text/javascript"
    src="{{ asset('js/jquery-ui-1.12.1.custom.min.js') }}"
></script>
<script
    type="text/javascript"
    src="{{ asset('js/jquery.ui.touch-punch.min.js') }}"
></script>
<script type="text/javascript" src="{{ asset('js/jquery.isotope.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.easing.1.4.1.min.js') }}"></script>
<script
    type="text/javascript"
    src="{{ asset('js/jquery.carouFredSel-6.2.1-packed.js') }}"
></script>
<script type="text/javascript" src="{{ asset('js/jquery.touchSwipe.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.transit.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.hint.min.js') }}"></script>
<script
    type="text/javascript"
    src="{{ asset('js/jquery.costCalculator.min.js') }}"
></script>
<script type="text/javascript" src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.qtip.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.blockUI.min.js') }}"></script>
<script
    type="text/javascript"
    src="{{ asset('js/jquery.imagesloaded-packed.js') }}"
></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/odometer.min.js') }}"></script>
</body>
</html>
