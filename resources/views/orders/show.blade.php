@extends('layouts.app')
@section('content')

{{ $cart }}
            
    <!-- Hero Section-->
    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>Orders</h1>
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



            </nav>
          </div>
          
          
          <!--#If Auth-->
          @if($user['id'] == Auth::id())
          <div class="col-lg-8 col-xl-9 pl-lg-3">
            
            <table class="table table-hover table-responsive-md">
              <thead>
                <tr>
                  <th>Track ID</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

          
               
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

               


              </tbody>
            </table>
          </div>
          @endif
        </div>


      </div>
    </section>
    

@endsection
