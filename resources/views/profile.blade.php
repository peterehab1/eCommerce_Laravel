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
              
              <a class="list-group-item d-flex justify-content-between align-items-center" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="checkout1.html" class="btn btn-template wide">Logout</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
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
                  <td><span class="badge badge-danger">Paused</span></td>
                  @endif
                  <td>
                    <a href="{{ url('product/'.$product['id'].'') }}" class="btn btn-primary btn-sm"> View </a><br>


                    <!-- The Delete Modal -->
                    <div class="modal" id="modal_delete">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Delete {{ $product['name'] }}</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                            Are you sure ?
                          </div>

                          <!-- Modal footer -->
                          <div class="modal-footer">
                            
                            <form action="{{ route('product.destroy', $product['id']) }}" method="POST">
                              @csrf
                              @method('delete')
                              <button class="btn-transp-red" type="submit">Delete</button>
                            </form>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                          </div>
                          

                        </div>
                      </div>
                    </div>


                    <!-- The Edit Modal -->
                    <div class="modal" id="modal_edit">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Edit {{ $product['name'] }}</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                              <div class="col-lg-12 col-xl-12 pl-lg-12">
                                    <form enctype="multipart/form-data" action="{{ route('product.update', $product['id']) }}" method="POST">
                                       @csrf
                                       @method('put')
                                      <!-- Invoice Address-->
                                      <div class="block-header mb-5">
                                        <h5>Add Product Info <span id="test" style="color: red;"></span></h5>
                                      </div>
                                      <div class="row">
                                        <div class="form-group col-md-6">
                                          <label for="product_name" class="form-label">Product Name</label>
                                          <input required id="product_name" type="text" name="product_name" value="{{ $product['name'] }}" class="form-control">
                                        </div>

                                        <div class="form-group col-md-6">
                                          <label for="product_price" class="form-label">Product Price</label>
                                          <input step="0.01" required id="product_price" type="number" name="product_price" value="{{ $product['price'] }}" class="form-control">
                                        </div>

                                        <div class="form-group col-lg-12 col-md-12">
                                          <label for="product_desc" class="form-label">Product Description</label>
                                          <textarea required rows="5" id="product_desc" type="text" name="product_desc" class="form-control">{{ $product['desc'] }}</textarea>
                                        </div>
                    
                                        <br>
                                        <div class="form-group col-md-6">
                                          <label for="product_category" class="form-label">Category</label>
                                          <select required id="product_category" name="product_category" class="form-control">
                                            @foreach($category as $c)
                                              <option value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                          </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                          <label for="stock" class="form-label">Stock</label>
                                          <input required id="stock" type="number" name="product_stock" value="{{ $product['stock'] }}" class="form-control">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="form-group col-12 mt-3">
                                        </div>
                                      </div>

                                      <!-- Modal footer -->
                                      <div class="modal-footer">
                                        
                                          <button type="submit" class="btn btn-warning">Edit</button>
                                      
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                      </div>
                                    </form>
                              </div>

                          </div>

                        </div>
                      </div>
                    </div>

                    
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_edit">
                      Edit
                    </button>

                    @if($product['status'] == 0)
                    <form action="{{ route('continue', $product['id']) }}" method="POST">
                              @csrf
                              <button class="btn btn-info btn-sm" type="submit"> Continue </button>
                            </form>

                    @elseif($product['status'] == 1)
                    <form action="{{ route('pause', $product['id']) }}" method="POST">
                              @csrf
                              <button class="btn btn-info btn-sm" type="submit"> Pause </button>
                            </form>

                    @endif
                    
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_delete">
                      Delete
                    </button>

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
