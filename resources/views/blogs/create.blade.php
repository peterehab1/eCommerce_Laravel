@extends('layouts.app')
@section('content')

    <section class="padding-small">
      <div class="container">
        <div class="row">
          
          <div class="col-lg-12 col-xl-12 pl-lg-12">
            <form enctype="multipart/form-data" method="post" action="{{ route('blog.store') }}">
              @csrf
              <!-- Invoice Address-->
              <div class="block-header mb-5">
                <h5>Create New Post <span id="test" style="color: red;"></span></h5>
              </div>
              <input required type="number" value="{{ Auth::id() }}" name="user_id" hidden>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="blog_title" class="form-label">Title</label>
                  <input required id="blog_title" type="text" name="blog_title" placeholder="Enter Blog Title" class="form-control">
                </div>

                <div class="form-group col-lg-12 col-md-12">
                  <label for="blog_post" class="form-label">Post</label>
                  <textarea required rows="5" id="blog_post" type="text" name="blog_post" placeholder="Enter your Blog Post" class="form-control"></textarea>
                </div>

                 <div class="form-group col-md-12">
                  <label for="blog_image" class="form-label">Blog Image</label>
                  <input required id="blog_image" type="file" name="blog_image" class="form-control">
                </div>

              </div>
              <div class="row">
                <div class="form-group col-12 mt-3">


                  <button id="submit_form" type="submit" class="btn btn-block btn-success wide"><i class="fa fa-send"></i>Add New Post</button>

                </div>
              </div>
            </form>
            
          </div>
        </div>
      </div>
    </section>
    

@endsection
