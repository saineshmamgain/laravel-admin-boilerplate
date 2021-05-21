<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin-lte/css/app.css') }}">

    @stack('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    @include('components.admin-lte-navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    @include('components.admin-lte-main-sidebar')

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    @include('components.admin-lte-control-sidebar')
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    @include('components.admin-lte-footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="{{ asset('admin-lte/js/app.js') }}"></script>

@stack('scripts')
</body>
</html>
