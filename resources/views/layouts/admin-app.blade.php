<!doctype html>
<html lang="en">

<!-- Mirrored from vetra.laborasyon.com/demos/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Jul 2021 03:57:10 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Realstate | @yield('title')  </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}"/>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&amp;display=swap" rel="stylesheet">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="{{ asset('backend/dist/icons/bootstrap-icons-1.4.0/bootstrap-icons.min.css') }}" type="text/css">
    <!-- Bootstrap Docs -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/bootstrap-docs.css') }}" type="text/css">

        <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('backend/libs/slick/slick.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('backend/libs/dataTable/datatables.min.css') }}" type="text/css">
    <!-- Main style file -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/app.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('backend/libs/animate/animate.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('backend/libs/select2/css/select2.min.css') }}" type="text/css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    

    @yield('styles')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- preloader -->
<div class="preloader">
    <img src="https://vetra.laborasyon.com/assets/images/logo.svg" alt="logo">
    <div class="preloader-icon"></div>
</div>
<!-- ./ preloader -->

<!-- sidebars -->

@include('admin.includes.notification')

<!-- ./ sidebars -->

<!-- menu -->
@include('admin.includes.sidebar')
<!-- ./  menu -->

<!-- layout-wrapper -->
<div class="layout-wrapper">

    <!-- header -->
    @include('admin.includes.navbar')
    <!-- ./ header -->

    <!-- content -->
    <div class="content ">
        
    @yield('content')

    </div>
    <!-- ./ content -->

    <!-- content-footer -->
    @include('admin.includes.footer')
    <!-- ./ content-footer -->

</div>
<!-- ./ layout-wrapper -->

<!-- Bundle scripts -->
<script src="{{ asset('backend/libs/bundle.js') }}"></script>

<!-- Apex chart -->
<script src="{{ asset('backend/libs/charts/apex/apexcharts.min.js') }}"></script>

<!-- Slick -->
<script src="{{ asset('backend/libs/slick/slick.min.js') }}"></script>

<!-- Examples -->
<script src="{{ asset('backend/dist/js/examples/dashboard.js') }}"></script>

<!-- Main Javascript file -->
<script src="{{ asset('backend/dist/js/app.min.js') }}"></script>
<script src="{{ asset('backend/libs/dataTable/datatables.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('backend/libs/ckeditor5/ckeditor.js') }}"></script>
<script src="{{ asset('backend/dist/js/examples/ckeditor.js') }}"></script>
<script src="{{ asset('backend/libs/select2/js/select2.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $('#datatable-example').DataTable({
        responsive: true
    });
</script>
@yield('scripts')
</body>

<!-- Mirrored from vetra.laborasyon.com/demos/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Jul 2021 03:57:43 GMT -->
</html>
