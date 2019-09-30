<html>
    <head>
        <title>{{ env('SITE_TITLE') }} - @yield('title')</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Find easily a clinic and book online">
        <meta name="author" content="ConectClinic">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicons-->
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

        <!-- GOOGLE WEB FONT -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

        <!-- BASE CSS -->
        <link href="/site/css/bootstrap.min.css" rel="stylesheet">
        <link href="/site/css/style.css" rel="stylesheet">
        <link href="/site/css/menu.css" rel="stylesheet">
        <link href="/site/css/vendors.css" rel="stylesheet">
        <link href="/site/css/icon_fonts/css/all_icons_min.css" rel="stylesheet">
        <link href="/site/css/general.css" rel="stylesheet">

        <!-- YOUR CUSTOM CSS -->
        <link href="/site/css/custom.css" rel="stylesheet">

        <script src="/node_modules/axios/dist/axios.min.js"></script>
        <script src="/node_modules/vue/dist/vue.min.js"></script>
        <script src="/site/modules/common/init.js"></script>

        @yield('css')
    </head>
    <body>


        <div class="layer"></div>
        <!-- Mobile menu overlay mask -->

        <!--div id="preloader">
            <div data-loader="circle-side"></div>
        </div-->
        <!-- End Preload -->

        @include('site.layouts.header')

        <main>
            @yield('content')
        </main>

        @include('site.layouts.footer')


        <div id="toTop"></div>
        <!-- Back to top button -->

        <!-- COMMON SCRIPTS -->
        <script src="/site/js/jquery-2.2.4.min.js"></script>
        <script src="/site/js/common_scripts.min.js"></script>

        @yield('js')
    </body>
</html>