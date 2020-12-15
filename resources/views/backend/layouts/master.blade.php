<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunshine|</title>

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

</head>

<body>
    <!-- Navbar -->
    @include('backend.layouts.partials.navbar')
    <!-- End Navbar -->

     <!-- Main content -->
     <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('backend.layouts.partials.sidebar')
            <!-- End sidebar -->

            <!-- Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"></h1>
                    <small></small>
                </div>
                @include('backend.layouts.partials.error-message')
                @yield('content')
            </main>
            <!-- End content -->
        </div>
    </div>
    <!-- End main content -->
        </div>
    </div>

    <!-- End main content -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.js') }}"></script>
    
    <!-- Các custom script dành riêng cho từng view -->
    @yield('custom-alert')

</body>

</html>