@section('title', 'Cart')
@extends('layouts.app')
@section('content')

 @if($cart->first() != '')
  <!-- Hero Section-->
    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>Shopping cart</h1>
          </div>
          <div class="col-lg-3 text-right order-1 order-lg-2">
          </div>
        </div>
      </div>
    </section>
    <!-- Shopping Cart Section-->
    <section class="shopping-cart">
      <div class="container">
        <div class="basket">
          <div class="basket-holder">
            <div class="basket-header">
              <div class="row">
                <div class="col-5">Product</div>
                <div class="col-2">Price</div>
                <div class="col-2">Quantity</div>
                <div class="col-1">Total</div>
                <div class="col-2 text-center">Action</div>
              </div>
            </div>
            <div class="basket-body">
              
              @foreach($cart as $c)

                <!-- Product-->
              <div class="item">
                <div class="row d-flex align-items-center">
                  <div class="col-5">
                    <div class="d-flex align-items-center"><img src="{{ url('assets/images/uploads/'.$c->product->first()->image.'') }}" alt="..." class="img-fluid">
                      <div class="title"><a href="detail.html">
                          <h5>{{ $c->product->first()->name }}</h5>
                          @if($c->size->first())
                          <span class="text-muted">Size : {{ $c->size->first()->size }}</span><br>
                          @endif


                          @if($c->color->first())
                          <span class="text-muted">Color : {{ $c->color->first()->color }}</span>
                          @endif
                        </a></div>
                    </div>
                  </div>
                  <div class="col-2"><span>${{ $c->product->first()->price }}</span></div>
                  <div class="col-2">
                    <div class="d-flex align-items-center">
                      <div class="quantity d-flex align-items-center">
                        
                        <form action="{{ route('cart.update', $c->id) }}" method="POST">
                           @csrf
                            @method('put')

                            <input hidden name="id" type="number" value="{{ $c->id }}">
                            <input name="quantity" type="number" value="{{ $c->quantity }}" class="quantity-no">
                            <button  class="btn-transp-green" type="submit">Update <i class="fa fa-check"></i></button>

                        </form>
                        
                      </div>
                    </div>
                  </div>
                  <div class="col-1"><span>${{ $c->quantity * $c->product->first()->price}}</span></div>
                  <div class="col-2 text-center">
                    <form action="{{ route('cart.destroy', $c->id) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button class="btn-transp-red" type="submit">Delete <i class="delete fa fa-trash"></i></button>
                    </form>
                    
                    
                      
                    
                  </div>
                </div>
              </div>

              @endforeach
              
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="CTAs d-flex align-items-center justify-content-center justify-content-md-end flex-column flex-md-row"><a href="{{ url('/') }}" class="btn btn-template-outlined wide">Continue Shopping</a></div>
      </div>
    </section>
    <!-- Order Details Section-->
    <section class="order-details no-padding-top"> 
      <div class="container">
        <div class="row">                         
          
          <div class="col-lg-12">
            <div class="block">
              <div class="block-header">
                <h6 class="text-uppercase">Order Summary</h6>
              </div>
              <div class="block-body">         
                <ul class="order-menu list-unstyled">
                  
                 
                  <li class="d-flex justify-content-between"><span><strong>Total</strong></span><strong class="text-primary price-total">${{ $total }}</strong></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-12 text-center CTAs"><a href="{{ route('order.create') }}" class="btn btn-template btn-lg wide">Proceed to checkout<i class="fa fa-long-arrow-right"></i></a></div>
        </div>
      </div>
    </section>


 
 @else

  <!-- Hero Section-->
    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>Shopping cart</h1>
          </div>
          <div class="col-lg-3 text-right order-1 order-lg-2">
          </div>
        </div>
      </div>
    </section>
    <!-- Shopping Cart Section-->
    <section class="shopping-cart">
      <div class="container">
        <h1>Your Shopping Cart is Empty !</h1>
      </div>
    </section>
    


 @endif 
@endsection
