@section('title', 'New Product')
@extends('layouts.app')
@section('content')

    <section class="padding-small">
      <div class="container">
        <div class="row">
          
          <div class="col-lg-12 col-xl-12 pl-lg-12">
            <form enctype="multipart/form-data" method="post" action="{{ route('product.store') }}">
              @csrf
              <!-- Invoice Address-->
              <div class="block-header mb-5">
                <h5>Add Product Info <span id="test" style="color: red;"></span></h5>
              </div>
              <input required type="number" value="{{ Auth::id() }}" name="user_id" hidden>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="product_name" class="form-label">Product Name</label>
                  <input required id="product_name" type="text" name="product_name" placeholder="Enter Product Name" class="form-control">
                </div>

                <div class="form-group col-md-6">
                  <label for="product_price" class="form-label">Product Price</label>
                  <input step="0.01" required id="product_price" type="number" name="product_price" placeholder="Enter Product Prcie" class="form-control">
                </div>

                <div class="form-group col-lg-12 col-md-12">
                  <label for="product_desc" class="form-label">Product Description</label>
                  <textarea required rows="5" id="product_desc" type="text" name="product_desc" placeholder="Enter your Product Description" class="form-control"></textarea>
                </div>

                <!--#Available Colors-->
                <div class="form-group col-md-2">
                  <label for="product_color" class="form-label">Available Colors</label>
                  <select  id="product_color_1" name="product_color_1" class="form-control">
                    
                      <option value="Nothing_1">Nothing</option> 
                      <option value="White">White</option> 
                      <option value="Yellow">Yellow</option>  
                      <option value="Fuchsia">Fuchsia</option> 
                      <option value="Red">Red</option>     
                      <option value="Silver">Silver</option>  
                      <option value="Gray">Gray</option>  
                      <option value="Olive">Olive</option> 
                      <option value="Purple">Purple</option>  
                      <option value="Maroon">Maroon</option>  
                      <option value="Aqua">Aqua</option>  
                      <option value="Lime">Lime</option>  
                      <option value="Teal">Teal</option>  
                      <option value="Green">Green</option> 
                      <option value="Blue">Blue</option>  
                      <option value="Navy">Navy</option>  
                      <option value="Black">Black</option>
                    
                  </select>
                </div>
                
                
                <!--#Available Colors-->
                <div class="form-group col-md-2">
                  <label for="product_color" class="form-label">Available Colors</label>
                  <select id="product_color_2" name="product_color_2" class="form-control">
                    
                      <option value="Nothing_2">Nothing</option> 
                      <option value="White">White</option> 
                      <option value="Yellow">Yellow</option>  
                      <option value="Fuchsia">Fuchsia</option> 
                      <option value="Red">Red</option>     
                      <option value="Silver">Silver</option>  
                      <option value="Gray">Gray</option>  
                      <option value="Olive">Olive</option> 
                      <option id="purple" value="Purple">Purple</option>  
                      <option value="Maroon">Maroon</option>  
                      <option value="Aqua">Aqua</option>  
                      <option value="Lime">Lime</option>  
                      <option value="Teal">Teal</option>  
                      <option value="Green">Green</option> 
                      <option value="Blue">Blue</option>  
                      <option value="Navy">Navy</option>  
                      <option value="Black">Black</option>
                    
                  </select>
                </div>

                <!--#Available Colors-->
                <div class="form-group col-md-2">
                  <label for="product_color" class="form-label">Available Colors</label>
                  <select id="product_color_3" name="product_color_3" class="form-control">
                    
                      <option value="Nothing_3">Nothing</option> 
                      <option value="White">White</option> 
                      <option value="Yellow">Yellow</option>  
                      <option value="Fuchsia">Fuchsia</option> 
                      <option value="Red">Red</option>     
                      <option value="Silver">Silver</option>  
                      <option value="Gray">Gray</option>  
                      <option value="Olive">Olive</option> 
                      <option value="Purple">Purple</option>  
                      <option value="Maroon">Maroon</option>  
                      <option value="Aqua">Aqua</option>  
                      <option value="Lime">Lime</option>  
                      <option value="Teal">Teal</option>  
                      <option value="Green">Green</option> 
                      <option value="Blue">Blue</option>  
                      <option value="Navy">Navy</option>  
                      <option value="Black">Black</option>
                    
                  </select>
                </div>

                

                
             
                
                <div class="form-group col-md-2">
                  <!--#Ava Sizes-->
                <label for="product_color" class="form-label col-md-12">Available Sizes</label>
                  <select id="product_size_1" name="product_size_1" class="form-control">
                    
                      <option value="Null_1">Nothing</option> 
                      <option value="XS">XS</option> 
                      <option value="S">S</option> 
                      <option value="M">M</option> 
                      <option value="L">L</option> 
                      <option value="XL">XL</option>
                      <option value="XXL">XXL</option> 
                    
                  </select>
                </div>

                <div class="form-group col-md-2">
                  <label for="product_color" class="form-label col-md-12">Available Sizes</label>
                  <select  id="product_size_2" name="product_size_2" class="form-control">
                    
                      <option value="Null_2">Nothing</option> 
                      <option value="XS">XS</option> 
                      <option value="S">S</option> 
                      <option value="M">M</option> 
                      <option value="L">L</option> 
                      <option value="XL">XL</option>
                      <option value="XXL">XXL</option> 
                    
                  </select>
                </div>

                <div class="form-group col-md-2">
                  <label for="product_color" class="form-label col-md-12">Available Sizes</label>
                  <select  id="product_size_3" name="product_size_3" class="form-control">
                    
                      <option value="Null_3">Nothing</option> 
                      <option value="XS">XS</option> 
                      <option value="S">S</option> 
                      <option value="M">M</option> 
                      <option value="L">L</option> 
                      <option value="XL">XL</option>
                      <option value="XXL">XXL</option> 
                    
                  </select>
                </div>
              

                
                <br>
                <div class="form-group col-md-4">
                  <label for="product_category" class="form-label">Category</label>
                  <select required id="product_category" name="product_category" class="form-control">
                    @foreach($category as $c)
                      <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group col-md-4">
                  <label for="product_gender" class="form-label">Gender</label>
                  <select required id="product_gender" name="product_gender" class="form-control">
                   
                      <option value="1">Men</option>
                      <option value="2">Women</option>
                   
                  </select>
                </div>

                <div class="form-group col-md-4">
                  <label for="stock" class="form-label">Stock</label>
                  <input required id="stock" type="number" name="product_stock" placeholder="How many do you have ?" class="form-control">
                </div>

                

                 <div class="form-group col-md-12">
                  <label for="image" class="form-label">Product Image</label>
                  <input required id="image" type="file" name="product_image" placeholder="How many do you have ?" class="form-control">
                </div>

              </div>
              <div class="row">
                <div class="form-group col-12 mt-3">


                  <button style="display: none;" id="submit_form" type="submit" class="btn btn-block btn-success wide"><i class="fa fa-send"></i>Add Product</button>

                </div>
              </div>
            </form>
            <p style="color: red;" id="message"></p>
            <button id="confirm_btn" style="display: block;"  onclick="check()" class="btn btn-danger wide"><i class="fa fa-save"></i>Confirm ?</button>

          </div>
        </div>
      </div>
    </section>
    <script type="text/javascript">

      function check() {

              var product_name = $("#product_name");
              var product_price = $("#product_price");
              var product_desc = $("#product_desc");
              var product_stock = $("#stock");
              var product_image = $("#image");

              var color1 = $('#product_color_1').val();
              var color2 = $('#product_color_2').val();
              var color3 = $('#product_color_3').val();

              var size1 = $('#product_size_1').val();
              var size2 = $('#product_size_2').val();
              var size3 = $('#product_size_3').val();

              if (product_name.val().length > 0 && product_price.val().length > 0 && product_desc.val().length > 0 && product_stock.val().length > 0 && product_image.val().length > 0) {
                  
                  if (color1 != color2 && color1 != color3 &&
                color2 != color3 && size1 != size2 && size1 != size3 &&
                size2 != size3
                )

                { 
                  product_name.prop("readonly", true);
                  product_price.prop("readonly", true);
                  product_desc.prop("readonly", true);
                  product_stock.prop("readonly", true);
                  product_image.prop("readonly", true);

                  $('#product_color_1').hide();
                  $('#product_color_2').hide();
                  $('#product_color_3').hide();

                  $('#product_size_1').hide();
                  $('#product_size_2').hide();
                  $('#product_size_3').hide();

                  $('#product_category').hide();


                  document.getElementById('message').innerHTML = '';
                  $("#submit_form").show();
                  $("#confirm_btn").hide();
                }

                else {
                $("#submit_form").hide();
                }

              }else{
                document.getElementById('message').innerHTML = 'Error - Check your inputs again , Maybe you left something Empty, Or Choose the same Value Twice';
              }
       
              

              

      }       

    </script>
</html>

@endsection
