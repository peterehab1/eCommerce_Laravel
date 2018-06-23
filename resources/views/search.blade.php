@extends('layouts.app')
@section('content')


<!-- Hero Section-->
    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>Found ({{ $products_count }}) Matches with your search "{{ $word }}"</h1>
          </div>
          <div class="col-lg-3 text-right order-1 order-lg-2">
            
          </div>
        </div>
      </div>
    </section>
    <main>
      <div class="container">
        <div class="row">
          <!-- Grid -->
          <div class="products-grid col-12 sidebar-none">
            <header class="d-flex justify-content-between align-items-start"><span class="visible-items">Showing<strong>  {{ $products->count() }}  Of <strong>{{ $products_count }}</strong> </strong>Product</span>
            </header>
            <div class="row">
             
             @foreach($products as $product)

              <!-- item-->
              <div class="item col-xl-3 col-lg-4 col-md-6">
                <div class="product is-gray">
                  <div class="image d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/images/uploads/'.$product->image.'') }}" alt="product" class="img-fluid">
                    <div class="hover-overlay d-flex align-items-center justify-content-center">
                      <div class="CTA d-flex align-items-center justify-content-center"><a href="{{ url('product/'.$product->id.'') }}" class="visit-product active"><i class="icon-search"></i>View</a></div>
                    </div>
                  </div>
                  <div class="title"><small class="text-muted">{{ $product->category['name'] }}</small><a href="detail.html">
                      <h3 class="h6 text-uppercase no-margin-bottom">{{ $product->name }}</h3></a><span class="price text-muted">{{ $product->price }}$</span></div>
                </div>
              </div>

             @endforeach

              
            </div>
          {{ $products->links() }}
          </div>
          <!-- / Grid End-->
        </div>
      </div>
    </main>



@endsection
