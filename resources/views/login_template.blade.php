<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>TrashTech | Login</title>


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
                <a href="{{route('store')}}"><img src="{{asset('resources/assets/img/logo.png')}}" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="{{route('store')}}">Home</a></li>
                    @foreach ($categories as $categorie)
                    <li><a href="{{route('store', ['id' => 1 ])}}">{{$categorie->name}}</a></li>
                    @endforeach
                </ul>
            </nav>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-10">
                        <a href="{{route('checkout')}}" class="cart-nav"><img src="{{asset('resources/assets/img/cart.png')}}" alt=""> Cart <span>({{session('cart')->totalQty}}) {{session('cart')->totalPrice}}$</span></a>
                        <a href="{{route('emptyCart')}}" class="cart-nav">Empty Cart</a>
            </div>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <a href="{{route('register')}}" class="btn amado-btn active">Register</a>
            </div>
        </header>
        <!-- Header Area End -->
        
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart_details_area mt-50 clearfix">
                        
                            <div class="cart-title">
                                <h2>Login</h2>
                                <p></p>
                            </div>
                        
                            <form action="{{route('loginAct')}}" method="post">
                                
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                @if ($errors->any() || isset($err_auth))
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            @if(isset($err_auth))
                                                <li>{{$err_auth}}</li>
                                            @endif
                                        </ul>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <h6>Email Address:</h6>
                                        <input type="email" class="form-control" name="email" value="" placeholder="Enter email" required>
                                    </div>
                                    <div class="col-12 mb-5">
                                        <h6>Password:</h6>
                                        <input type="password" class="form-control" name="pass" placeholder="Enter password" value="" required>
                                    </div>
                                    <div class="cart-btn">
                                        <button type="submit" class="btn amado-btn w-100">Login</button>  
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Product Catagories Area Start -->
        
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-2 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Copywrite Text -->
                        <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>       
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="{{asset('resources/assets/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('resources/assets/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('resources/assets/js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('resources/assets/js/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('resources/assets/js/active.js')}}"></script>

</body>

</html>