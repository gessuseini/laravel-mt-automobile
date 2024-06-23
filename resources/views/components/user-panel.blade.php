<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://www.mt-automobile.ch/wp-content/themes/carservice/images/favicon.ico" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
            background: <?php echo $globalSettings->website_theme_color ?>;
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
            background: <?php echo $globalSettings->website_theme_color ?> !important;
            border-color: <?php echo $globalSettings->website_theme_color ?> !important;
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
            <div class="theme-page">
                <div class="py-12 bg-gray-100">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <!--
                          This example requires updating your template:

                          ```
                          <html class="h-full bg-gray-100">
                          <body class="h-full">
                          ```
                        -->
                        <div class="min-h-full">
                            <nav class="bg-gray-800">
                                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                                    <div class="flex h-16 items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=blue&shade=500" alt="Your Company">
                                            </div>
                                            <div class="hidden md:block">
                                                <div class="ml-10 flex items-baseline space-x-4">
                                                    <a style="text-decoration: none;" href=" {{ route('dashboard') }} " class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Dashboard</a>
                                                    <a style="text-decoration: none;" href=" {{ url('appointments') }} " class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Appointments</a>
                                                    <a style="text-decoration: none;" href=" {{ route('profile.edit') }} " class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hidden md:block">
                                            <div class="ml-4 flex items-center md:ml-6">

                                                <!-- Profile dropdown -->
                                                <div class="relative ml-3">
                                                    <div>
                                                        <span class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                                            <span class="absolute -inset-1.5"></span>
                                                            <span class="sr-only">Open user menu</span>
                                                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                                            <h3 class="text-white pl-3">{{ Auth::user()->name }}</h3>
                                                        </span>
                                                    </div>

                                                    <!--
                                                      Dropdown menu, show/hide based on menu state.

                                                      Entering: "transition ease-out duration-100"
                                                        From: "transform opacity-0 scale-95"
                                                        To: "transform opacity-100 scale-100"
                                                      Leaving: "transition ease-in duration-75"
                                                        From: "transform opacity-100 scale-100"
                                                        To: "transform opacity-0 scale-95"
                                                    -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="-mr-2 flex md:hidden">
                                            <!-- Mobile menu button -->
                                            <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                                                <span class="absolute -inset-0.5"></span>
                                                <span class="sr-only">Open main menu</span>
                                                <!-- Menu open: "hidden", Menu closed: "block" -->
                                                <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                                </svg>
                                                <!-- Menu open: "block", Menu closed: "hidden" -->
                                                <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Mobile menu, show/hide based on menu state. -->
                                <div class="md:hidden" id="mobile-menu">
                                    <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                                        <a style="text-decoration: none;" href=" {{ route('dashboard') }} " class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Dashboard</a>
                                        <a style="text-decoration: none;" href=" {{ route('appointments') }} " class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Appointments</a>
                                        <a style="text-decoration: none;" href=" {{ route('profile.edit') }} " class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Settings</a>
                                    </div>
                                    <div class="border-t border-gray-700 pb-3 pt-4">
                                        <div class="flex items-center px-5">
                                            <div class="flex-shrink-0">
                                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-base font-medium leading-none text-white">Tom Cook</div>
                                                <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
                                            </div>
                                            <button type="button" class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                                <span class="absolute -inset-1.5"></span>
                                                <span class="sr-only">View notifications</span>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="mt-3 space-y-1 px-2">
                                            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a>
                                            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
                                            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
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
