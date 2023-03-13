<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Bài 3 - Admin</title>
    <!-- Bootstrap Styles-->
    <link href="{{ asset('assets/admin/css/bootstrap.css') }}" rel="stylesheet"/>
    <!-- FontAwesome Styles-->
    <link href="{{ asset('assets/admin/css/font-awesome.css') }}" rel="stylesheet"/>
    <!-- Morris Chart Styles-->
    <link href="{{ asset('assets/admin/js/morris/morris-0.4.3.min.css') }}" rel="stylesheet"/>
    <!-- Custom Styles-->
    <link href="{{ asset('assets/admin/css/custom-styles.css') }}" rel="stylesheet"/>
    <!-- Google Fonts-->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/sweetalert.css') }}">
    <script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>
    <script src="{{asset('assets/admin/js/js.js')}}"></script>
    <script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>


</head>

<body>
<div id="wrapper">
    @include('admin.layout.header')
    <!--/. NAV TOP  -->
    @include('admin.layout.menu')
    <!-- /. NAV SIDE  -->

    <div id="page-wrapper">
        <div class="header">

            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Library</a></li>
                <li class="active">Data</li>
            </ol>

        </div>
        <div id="page-inner">
            @yield('main_content')
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<script>


</script>
</body>

</html>
