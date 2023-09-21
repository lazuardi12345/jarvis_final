<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Gaji Pegawai</title>

    <link rel="stylesheet" href="{{asset('assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main/app-dark.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/images/logo/favicon.png')}}" type="image/png">

    <link rel="stylesheet" href="{{asset('assets/css/shared/iconly.css')}}">

    <link rel="stylesheet" href="{{asset('assets/extensions/simple-datatables/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/pages/simple-datatables.css')}}" />

</head>

<body>
    <div id="app">
        @include('partials.sidebar')
        <div id="main" class='layout-navbar'>
            @include('partials.header')

            <!--Content Page-->
            <div id="main-content">
                @yield('content')

                <!--footer-->
                @include('partials.footer')
            </div>
        </div>
    </div>

    <!-- Need: Apexcharts -->
    <script src="{{asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/dashboard.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>

    <script src="{{asset('assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/js/pages/simple-datatables.js')}}"></script>
</body>

</html>
