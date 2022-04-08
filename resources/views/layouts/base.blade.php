
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ env('APP_NAME') }}">
        <meta name="author" content="JadeHouse InfoTech Services">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Title -->
        <title>LWCC - @yield('title')</title>

        <!-- Styles -->
        <link href="{{ asset("static/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
        <link href="{{ asset("static/css/main.min.css") }}" rel="stylesheet">
        <link href="{{ asset("static/css/custom.css") }}" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">

        <link href="{{ asset("static/plugins/perfectscroll/perfect-scrollbar.css") }}" rel="stylesheet">
        <link href="{{ asset("static/plugins/select2/css/select2.min.css") }}" rel="stylesheet">


        <!-- Theme Styles -->
        <style>
            label {
                display: inline-flex;
            }
            span.select2-container {
                z-index:10050;
            }
        </style>
        @yield('extra_css')

        {{-- <link rel="icon" type="image/png" sizes="32x32" href="../../assets/images/neptune.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/neptune.png" /> --}}

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="app align-content-stretch d-flex flex-wrap">
            @include('layouts.sidebar')
            <div class="app-container">
                @include('layouts.search')
                @include('layouts.app_header')

                <div class="app-content">
                    <div class="content-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="page-description mb-0 p-0">
                                        <h1>@yield('page_title')</h1>
                                    </div>
                                </div>
                            </div>

                            @if(session('success'))
                                <div class="alert alert-success font-weight-bolder"> {{ session('success') }} </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger font-weight-bolder"> {{ session('error') }} </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @yield('main_content')

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>


    <!-- Javascripts -->
    <script src="{{ asset("static/plugins/jquery/jquery-3.5.1.min.js") }}"></script>
    <script src="{{ asset("static/plugins/bootstrap/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("static/plugins/perfectscroll/perfect-scrollbar.min.js") }}"></script>
    <script src="{{ asset("static/js/main.min.js") }}"></script>
    <script src="{{ asset("static/js/custom.js") }}"></script>
    <script src="{{ asset("static/plugins/select2/js/select2.full.min.js") }}"></script>
    <script>
        $(document).ready(function() {
            $('select').select2({width: '100%'});
        });
    </script>
    @yield('extra_js')

</html>
