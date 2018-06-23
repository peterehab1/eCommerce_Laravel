@if(Session::has('message'))
<h6 class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</h6>
@endif
@section('title', 'Home')
@extends('layouts.app')
@section('content')
<!-- Hero Section-->
    <section class="hero hero-home no-padding">
      <!-- Hero Slider-->
      <div class="owl-carousel owl-theme hero-slider">
        <div style="background: url(assets/images/hero-bg.jpg);" class="item d-flex align-items-center has-pattern">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <h1>WOMEN COLLECTION</h1>
                <ul class="lead"> 
                  <li>New <strong>Designs</strong></li>
                  <li>Good<strong> Material</strong></li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div style="background: url(https://d19m59y37dris4.cloudfront.net/hub/1-3-1/img/hero-bg-2.jpg);" class="item d-flex align-items-center">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 text-white">
                <h1>Labore et dolore magna aliqua</h1>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
          </div>
        </div>
        <div style="background: url(https://d19m59y37dris4.cloudfront.net/hub/1-3-1/img/hero-bg-3.jpg);" class="item d-flex align-items-center">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 text-white">
                <h1>Sed do eiusmod tempor</h1>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Men's Collection -->
    <section class="men-collection gray-bg">
      <div class="container">
        <header class="text-center">
          <h2 class="text-uppercase"><small>Last added</small>Men Collection</h2>
        </header>
        <!-- Products Slider-->
        <div class="owl-carousel owl-theme products-slider">
          


          @foreach($product_men as $men)

           <!-- item-->
          <div class="item">
            <div class="product is-gray">
              <div class="image d-flex align-items-center justify-content-center"><img src="{{ asset('assets/images/uploads/'.$men->image.'') }}" alt="product" class="img-fluid">
                <div class="hover-overlay d-flex align-items-center justify-content-center">
                  <div class="CTA d-flex align-items-center justify-content-center"><a href="{{ url('product/'.$men->id.'') }}" class="visit-product active"><i class="icon-search"></i>View</a></div>
                </div>
              </div>
              <div class="title"><a href="{{ url('product/'.$men->id.'') }}">
                  <h3 class="h6 text-uppercase no-margin-bottom">{{ $men->name }}</h3></a><span class="price text-muted">{{ $men->price }}</span></div>
            </div>
          </div>

          @endforeach



        </div>
      </div>
    </section>
    
    <!-- Women's Collection -->
    <section class="women-collection">
      <div class="container">
        <header class="text-center">
          <h2 class="text-uppercase"><small>Last added</small>Women Collection</h2>
        </header>
        <!-- Products Slider-->
        <div class="owl-carousel owl-theme products-slider">
         

          @foreach($product_women as $women)

           <!-- item-->
          <div class="item">
            <div class="product is-gray">
              <div class="image d-flex align-items-center justify-content-center"><img src="{{ asset('assets/images/uploads/'.$women->image.'') }}" alt="product" class="img-fluid">
                <div class="hover-overlay d-flex align-items-center justify-content-center">
                  <div class="CTA d-flex align-items-center justify-content-center"><a href="{{ url('product/'.$women->id.'') }}" class="visit-product active"><i class="icon-search"></i>View</a></div>
                </div>
              </div>
              <div class="title"><a href="{{ url('product/'.$women->id.'') }}">
                  <h3 class="h6 text-uppercase no-margin-bottom">{{ $women->name }}</h3></a><span class="price text-muted">{{ $women->price }}</span></div>
            </div>
          </div>

          @endforeach

        </div>
      </div>
    </section>
    <!-- Blog Section-->
    <section class="blog gray-bg">
      <div class="container">
        <header class="text-center">
          <h2 class="text-uppercase"><small>Made it hard way</small>Latest from the blog</h2>
        </header>
        <div class="row">

          @foreach($blogs as $blog)


            <div class="col-lg-6">
            <div class="post d-flex align-items-center flex-md-row flex-column">
              <div class="thumbnail d-flex-align-items-center justify-content-center"><img src="{{ asset('assets/images/uploads/'.$blog->image.'') }}" alt="..."></div>
              <div class="info"> 
                <h4 class="h5"> <a href="{{ url('blog/'.$blog->id.'') }}">{{ $blog->title }}</a></h4><span class="date"><i class="fa fa-clock-o"></i>{{ $blog->created_at }}</span>
                <p>{{ substr($blog->post, 0, 150) }}</p><a href="{{ url('blog/'.$blog->id.'') }}" class="read-more">Read More<i class="fa fa-long-arrow-right"></i></a>
              </div>
            </div>
          </div>


          @endforeach
          

        
        </div>
      </div>
    </section>
    <!-- Brands Section-->
    <section class="brands">
      <div class="container">
        <!-- Brands Slider-->
        <div class="owl-carousel owl-theme brands-slider">
          <!-- item-->
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="https://d19m59y37dris4.cloudfront.net/hub/1-3-1/img/brand-1.svg" alt="..." class="img-fluid"></div>
          </div>
          <!-- item-->
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="https://d19m59y37dris4.cloudfront.net/hub/1-3-1/img/brand-2.svg" alt="..." class="img-fluid"></div>
          </div>
          <!-- item-->
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="https://d19m59y37dris4.cloudfront.net/hub/1-3-1/img/brand-3.svg" alt="..." class="img-fluid"></div>
          </div>
          <!-- item-->
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="https://d19m59y37dris4.cloudfront.net/hub/1-3-1/img/brand-4.svg" alt="..." class="img-fluid"></div>
          </div>
          <!-- item-->
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="https://d19m59y37dris4.cloudfront.net/hub/1-3-1/img/brand-5.svg" alt="..." class="img-fluid"></div>
          </div>
          <!-- item-->
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="https://d19m59y37dris4.cloudfront.net/hub/1-3-1/img/brand-6.svg" alt="..." class="img-fluid"></div>
          </div>
          <!-- item-->
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="https://d19m59y37dris4.cloudfront.net/hub/1-3-1/img/brand-1.svg" alt="..." class="img-fluid"></div>
          </div>
          <!-- item-->
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="https://d19m59y37dris4.cloudfront.net/hub/1-3-1/img/brand-2.svg" alt="..." class="img-fluid"></div>
          </div>
          <!-- item-->
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="https://d19m59y37dris4.cloudfront.net/hub/1-3-1/img/brand-3.svg" alt="..." class="img-fluid"></div>
          </div>
          <!-- item-->
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="https://d19m59y37dris4.cloudfront.net/hub/1-3-1/img/brand-4.svg" alt="..." class="img-fluid"></div>
          </div>
        </div>
      </div>
    </section>
    <!-- Overview Popup    -->
    <div id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade overview">
      <div role="document" class="modal-dialog">
        <div class="modal-content">
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="icon-close"></i></span></button>
          <div class="modal-body"> 
            <div class="ribbon-primary text-uppercase">Sale</div>
            <div class="row d-flex align-items-center">
              <div class="image col-lg-5"><img src="assets/images/shirt.png" alt="..." class="img-fluid d-block"></div>
              <div class="details col-lg-7">
                <h2>Lose Oversized Shirt</h2>
                <ul class="price list-inline">
                  <li class="list-inline-item current">$65.00</li>
                  <li class="list-inline-item original">$90.00</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                <div class="d-flex align-items-center">
                  <div class="quantity d-flex align-items-center">
                    <div class="dec-btn">-</div>
                    <input type="text" value="1" class="quantity-no">
                    <div class="inc-btn">+</div>
                  </div>
                  <select id="size" class="bs-select">
                    <option value="small">Small</option>
                    <option value="meduim">Medium</option>
                    <option value="large">Large</option>
                    <option value="x-large">X-Large</option>
                  </select>
                </div>
                <ul class="CTAs list-inline">
                  <li class="list-inline-item"><a href="#" class="btn btn-template wide"> <i class="fa fa-shopping-cart"></i>Add to Cart</a></li>
                  <li class="list-inline-item"><a href="#" class="visit-product active btn btn-template-outlined wide"> <i class="icon-heart"></i>Add to wishlist</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="scrollTop"><i class="fa fa-long-arrow-up"></i></div>
@endsection
