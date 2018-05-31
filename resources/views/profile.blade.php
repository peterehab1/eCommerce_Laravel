@extends('layouts.app')
@section('content')

            
    <!-- Hero Section-->
    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>Profile</h1>
          </div>
          
        </div>
      </div>
    </section>
    <section class="padding-small">
      <div class="container">
        <div class="row">
          <!-- Customer Sidebar-->
          <div class="customer-sidebar col-xl-3 col-lg-4 mb-md-5">
            <div class="customer-profile">
              <h5>{{ $user['name'] }}</h5>
              @if($user['id'] == Auth::id())
              <p class="text-muted text-small">{{ $user['email'] }}</p>
              @endif
            </div>
            <nav class="list-group customer-nav">

              <a href="customer-orders.html" class="active list-group-item d-flex justify-content-between align-items-center"><span><span class="icon icon-bag"></span>Products</span><small class="badge badge-pill badge-light">{{ $count }}</small></a>
              @if($user['id'] == Auth::id())
              <a href="customer-orders.html" class="list-group-item d-flex justify-content-between align-items-center"><span><span class="icon icon-bag"></span>Orders</span><small class="badge badge-pill badge-light">5</small></a>

              <a href="customer-login.html" class="list-group-item d-flex justify-content-between align-items-center"><span><span class="fa fa-sign-out"></span>Log out</span></a>
              @endif

            </nav>
          </div>
          
          
          <!--#If Auth-->
          @if($user['id'] == Auth::id())
          <div class="col-lg-8 col-xl-9 pl-lg-3">
            <a class="btn btn-block btn-primary" href="{{ route('product.create') }}">Add New Product</a><br>

            <table class="table table-hover table-responsive-md">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Stock</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

          
                @foreach($products as $product)
                  <tr>
                  <th>#{{ $product['id'] }}</th>
                  <td>{{ $product['name'] }}</td>
                  <td>{{ $product['stock'] }}</td>
                  @if($product['status'] == 1)
                  <td><span class="badge badge-success">Active</span></td>
                  @else
                  <td><span class="badge badge-danger">Canceled</span></td>
                  @endif
                  <td>
                    <a href="customer-order.html" class="btn btn-primary btn-sm"> View </a>
                    <a href="customer-order.html" class="btn btn-primary btn-sm"> Delete </a>
                    <a href="customer-order.html" class="btn btn-primary btn-sm"> Edit </a>
                    <a href="customer-order.html" class="btn btn-primary btn-sm"> Pause </a>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        @else
          <!--#If Not-->
          <div class="col-lg-8 col-xl-9 pl-lg-3">
            <a class="btn btn-block btn-primary" href="{{ route('product.create') }}">Add New Product</a><br>
            <table class="table table-hover table-responsive-md">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Action</th>
                  
                  
                </tr>
              </thead>
              <tbody>

               @foreach($products as $product)
                  <tr>
                  <th>{{ $product['name'] }}</th>
                  <td>{{ $product['price'] }} $</td>
                  <td>
                    <a href="customer-order.html" class="btn btn-primary btn-sm"> View </a>
                  </td>
                  
                  
                </tr>
                @endforeach


              </tbody>
            </table>
          </div>
          @endif
        </div>


      </div>
    </section>
    

@endsection
