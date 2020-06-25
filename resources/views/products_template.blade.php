<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>TrashTech | Home</title>


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
                <a href="{{route('store')}}"><img src="{{asset('resources/assets/img/logo.png')}}" alt="ssss"></a>
            </div>

            @if(session('id') != 0)
                <!-- Amado Nav -->
                <nav class="amado-nav">
                    <ul>
                        <li class="active"><a href="{{route('store')}}">Welcome {{session('name')}}</a></li>
                        @foreach ($categories as $categorie)
                        <li><a href="{{route('store', $categorie->id)}}">{{$categorie->name}}</a></li>
                        @endforeach
                    </ul>
                </nav>

                <!-- Cart Menu -->
                <div class="cart-fav-search mb-10">
                    <a href="{{route('checkout')}}" class="cart-nav"><img src="{{asset('resources/assets/img/cart.png')}}" alt=""> Cart <span>({{session('cart')->totalQty}}) {{session('cart')->totalPrice}}$</span></a>
                    <a href="{{route('emptyCart')}}" class="cart-nav">Empty Cart</a>
                    <a href="{{route('orders')}}" class="cart-nav">Orders</a>
                </div>

                <!-- Button Group -->
                <div class="amado-btn-group mt-30 mb-100">
                    <a href="{{route('logout')}}" class="btn amado-btn mb-15">Logout</a>
                </div>
            @else
                <!-- Amado Nav -->
                <nav class="amado-nav">
                    <ul>
                        <li class="active"><a href="{{route('store')}}">Home</a></li>
                        @foreach ($categories as $categorie)
                        <li><a href="{{route('store', $categorie->id)}}">{{$categorie->name}}</a></li>
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
                    <a href="{{route('login')}}" class="btn amado-btn mb-15">Login</a>
                    <a href="{{route('register')}}" class="btn amado-btn active">Register</a>
                </div>
            @endif

        </header>
        <!-- Header Area End -->
        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                            <!-- Sorting -->
                            <div class="product-sorting d-flex">
                                <div class="sort-by-date d-flex align-items-center mr-15">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products -->
                <div class="row">
                    @foreach ($products as $product)
                    <!-- Single Product Area -->
                    <div class="col-6 col-sm-3 col-md-6 col-xl-3">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{asset('resources/assets/img/$product->image')}}" alt="IMAGE HERE">     
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">{{$product->price}}$</p>
                                    <a href="product-details.html">
                                        <h6>{{$product->name}}</h6>
                                        
                                    </a>
                                </div>
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-right">
                                    <div class="cart">
                                        <a href="{{route('cart', $product->id)}}" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="{{asset('resources/assets/img/cart.png')}}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!--End of  Products -->


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