@section('title', 'Blog')
@extends('layouts.app')
@section('content')

 <!-- Hero Section-->
    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>{{ $blog->title }}</h1><p class="author-date-top">By <a href="{{ url('user/'.$blog->user_id.'') }}">{{ $blog->user->name }}</a> | {{ $blog->created_at }}</p>
          </div>
          
        </div>
      </div>
    </section>
    <section class="padding-small">
      <div class="container">
        <div class="row">
          <div class="col-xl-8 col-lg-10">           
            
            <div class="text-content"> 
              <p><img src="{{ asset('assets/images/uploads/'.$blog->image.'') }}" alt="Example blog post alt" class="img-fluid"></p>
              <p>{{ $blog->post }}</p>
              
            </div>
          </div>
        </div>     
      </div>
    </section>
           
@endsection
