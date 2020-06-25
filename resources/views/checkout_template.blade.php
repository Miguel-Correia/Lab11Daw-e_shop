<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>TrashTech | Checkout</title>


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
                        <li><a href="{{route('store', ['id' => 1 ])}}">{{$categorie->name}}</a></li>
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
                    <a href="{{route('login')}}" class="btn amado-btn mb-15">Login</a>
                    <a href="{{route('register')}}" class="btn amado-btn active">Register</a>
                </div>
            @endif

        </header>
        <!-- Header Area End -->
       
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                @if(session('cart')->totalQty == 0)
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart Empty</h2>
                        </div>
                    </div>
                @else
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>
                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(session('cart')->items as $item)
                                    <tr>
                                        <td class="cart_product_desc">
                                            <h5>{{$item['name']}}</h5>
                                        </td>
                                        <td class="price">
                                            <span>{{$item['price']}}$</span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <div class="quantity">
                                                    <a href="{{route('qtyChange', ['id'=>$item['id'], 'type'=>'minus'])}}"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                                    {{$item['qty']}}
                                                    <a href="{{route('qtyChange', ['id'=>$item['id'], 'type'=>'plus'])}}"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td><a href="{{route('remove', $item['id'])}}">Remove</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>{{session('cart')->totalPrice}}$</span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span>{{session('cart')->totalPrice}}$</span></li>
                            </ul>
                            @if(session('id') != 0)
                                <div class="cart-btn mt-100">
                                    <a href="{{route('checkoutAct')}}" class="btn amado-btn w-100">Checkout</a>
                                </div>
                            @else
                                <div class="cart-btn mt-100">
                                    <a href="{{route('login')}}" class="btn amado-btn w-100">Login to place order</a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
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