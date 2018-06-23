@extends('layouts.app')
@section('content')


<!-- Hero Section-->
    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>Blog</h1>
          </div>
          
        </div>
      </div>
    </section>
    <section class="blog">
      <div class="container">
         @if($user->role == 1)
         <a class="btn btn-primary btn-block" href="{{ route('blog.create') }}">New Blog</a><br>
         @endif
          <div class="row">

          
          @foreach($blogs as $blog)

          <!-- post-->
          <div class="col-lg-6">
            <div class="post post-gray d-flex align-items-center flex-md-row flex-column">
              <div class="thumbnail d-flex-align-items-center justify-content-center"><img src="https://d19m59y37dris4.cloudfront.net/hub/1-3-1/img/blog-1.jpg" alt="..."></div>
              <div class="info"> 
                <h4 class="h5"> <a href="{{ url('blog/'.$blog->id.'') }}">{{ $blog->title }}</a></h4>
                <a href="{{ url('user/'.$blog->user_id.'') }}"><span class="date"><i class="fa fa-user"></i>{{ $blog->user->name }}</span></a>
                <span class="date"><i class="fa fa-clock-o"></i>{{ $blog->created_at }}</span>
                <p>{{ substr($blog->post, 0, 150) }}</p><a href="{{ url('blog/'.$blog->id.'') }}" class="read-more">Read More<i class="fa fa-long-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <!-- /end post-->

          @endforeach

          
        </div>
        <!-- Pagination -->
        <nav aria-label="..." class="d-block w-100">
          {{ $blogs->links() }}
        </nav>
      </div>
    </section>


@endsection
