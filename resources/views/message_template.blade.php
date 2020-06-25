<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta http-equiv="refresh" content="3; {{route('store')}}" />

    <!-- Title  -->
    <title>TrashTech | Message</title>


    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('resources/assets/css/core-style.css')}}">

</head>

<body>
 
    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">
    <!--
        <div class="mobile-nav">

            <div class="amado-navbar-brand">
                <a href="index.html">AAA</a>
            </div>

            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>
    -->

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <img src="{{asset('resources/assets/img/logo.png')}}" alt="">
            </div>

            
        </header>
        <!-- Header Area End -->
        <div class="amado_product_area section-padding-100">

            <div class="col-12 col-lg-12"><h5 style="text-align: center;">{{$message}}</h5></div>
                
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="{{asset('resources/assets/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{asset('resources/assets/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('resources/assets/js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('resources/assets/js/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('resources/assets/js/active.js')}}"></script>


</body>

</html>