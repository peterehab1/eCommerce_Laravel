
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'eCommerce') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-3-1/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">
    <!-- Price Slider Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.css') }}">
    <!-- Custom font icons-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-3-1/css/custom-fonticons.css">
    <!-- Google fonts - Poppins-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/hub/1-3-1/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="https://d19m59y37dris4.cloudfront.net/hub/1-3-1/img/favicon.ico">
    <!-- Modernizr-->
    <script src="{{ asset('assets/js/modernizr.custom.79639.js') }}"></script>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <!-- Javascript files-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"> </script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel2.thumbs.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/js/front.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
  </head>
  <body>

    <!-- navbar-->
    <header class="header">
      
      <nav class="navbar navbar-expand-lg">
        <div class="search-area">
          <div class="search-area-inner d-flex align-items-center justify-content-center">
            <div class="close-btn"><i class="icon-close"></i></div>
            <form action="#">
              <div class="form-group">
                <input type="search" name="search" id="search" placeholder="What are you looking for?">
                <button type="submit" class="submit"><i class="icon-search"></i></button>
              </div>
            </form>
          </div>
        </div>
        <div class="container-fluid">  
          <!-- Navbar Header  -->
          <a href="{{ url('/') }}" class="navbar-brand"><strong>eCommerce</strong>
          </a>
          <button type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
          <!-- Navbar Collapse -->
          <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item"><a href="{{ url('/') }}" class="nav-link active">Home</a>
              </li>
              <li class="nav-item"><a href="category.html" class="nav-link"></a>
              </li>
              
             
              <!-- Multi level dropdown    -->
              <li class="nav-item dropdown"><a id="navbarDropdownMenuLink" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">Categories<i class="fa fa-angle-down"></i></a>
                <ul aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                  @foreach($categories as $category)
                  <li><a href="{{ url('category/'.$category->id.'') }}" class="dropdown-item">{{ $category->name }}</a></li>
                  @endforeach

                  
                </ul>
              </li>
              <!-- Multi level dropdown end-->
              <li class="nav-item"><a href="blog.html" class="nav-link">Blog </a>
              </li>
              <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a>
              </li>
            </ul>
            <div class="right-col d-flex align-items-lg-center flex-column flex-lg-row">
              <!-- Search Button-->
              <div class="search"><i class="icon-search"></i></div>
              <!-- User Not Logged - link to login page-->
              @guest
              <div class="user"> <a id="userdetails" href="{{ route('login') }}" class="user-link"><i class="icon-profile"> 
                </i></a></div>
              
              
                        
              @else
             <!-- User Dropdown-->
              <div class="cart dropdown show"><a id="cartdetails" href="https://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="icon-profile"></i>
                  </a><a href="cart.html" class="text-primary view-cart">View Cart</a>
                <div aria-labelledby="cartdetails" class="dropdown-menu">
                 
                  <!-- call to actions-->
                  <div class="dropdown-item CTA d-flex"><a href="{{ url('user/'.Auth::id().'') }}" class="btn btn-template wide">Profile</a>
                    <br>
                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="checkout1.html" class="btn btn-template wide">Logout</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></div>
                </div>
              </div>
              @endguest


              <!-- Cart Dropdown-->
              <div class="cart dropdown show"><a id="cartdetails" href="https://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="icon-cart"></i>
                  
                  @if($cartProductsCount > 0)
                  <div class="cart-no">{{ $cartProductsCount }}</div></a><a href="cart.html" class="text-primary view-cart">View Cart</a>
                  <div aria-labelledby="cartdetails" class="dropdown-menu">
                  @foreach($cart as $c)
                    <!-- cart item-->
                  <div class="dropdown-item cart-product">
                    <div class="d-flex align-items-center">
                      <div class="img"><img src="{{ url('assets/images/uploads/'.$c->product->first()->image.'') }}" alt="..." class="img-fluid"></div>
                      <div class="details d-flex justify-content-between">
                        <div class="text"> <a href="#"><strong>{{ $c->product->first()->name }}</strong></a><small>Quantity: {{ $c->quantity }} </small><span class="price">${{ $c->product->first()->price * $c->quantity}} </span></div>
                        <form action="{{ route('cart.destroy', $c->id) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button class="btn-transp-red" type="submit"><i class="delete fa fa-trash"></i></button>
                    </form>
                      </div>
                    </div>
                  </div>

                  @endforeach
                  <!-- total price-->
                  <div class="dropdown-item total-price d-flex justify-content-between"><span>Total</span><strong class="text-primary">${{ $total }}</strong></div>
                  <!-- call to actions-->
                  <div class="dropdown-item CTA d-flex"><a href="{{ url('/cart') }}" class="btn btn-template wide">View Cart</a><a href="checkout1.html" class="btn btn-template wide">Checkout</a></div>
                </div>
                  @else
                  </a><a href="cart.html" class="text-primary view-cart">View Cart</a>
                  <div aria-labelledby="cartdetails" class="dropdown-menu">
                  <div class="dropdown-item cart-product">
                    <div class="d-flex align-items-center">
                      <p>Your shopping cart is Empty</p>
                    </div>
                  </div>
                  </div>
                  @endif

                
              </div>
            </div>
            </div>

          </div>
        </div>
      </nav>
    </header>
    @yield('content')
    @extends('layouts.footer')





