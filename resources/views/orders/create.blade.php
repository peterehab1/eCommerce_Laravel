@section('title', 'New Order')
@extends('layouts.app')
@section('content')


    <br>
                <form method="post" action="{{ route('order.store') }}">
                  @csrf
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12">
                     
                    <strong><span>CHECKOUT ADDRESS</span></strong><br><br>  
                    <div class="card text-white bg-primary mb-3" >
                      <div class="card-header">Addresses You Entered Before</div>
                      <div class="card-body">
                        

                        @foreach($addresses as $address)
                        <input required type="radio" name="address_id" value="{{ $address->id }}"> {{ $address->address }} <br>
                        @endforeach
                        <a style="color: white;" href="{{ route('addressCreate') }}">Add New Address</a>
                       
                      </div>
                    </div>

                    </div>
                  </div>
                </div>

                <div class="container">
                  <div class="row">
                    <div class="col-lg-12">
                     
                    <strong><span>CHECKOUT PAYMENT</span></strong><br><br>  
                    <div class="card text-white bg-primary mb-3" >
                      <div class="card-header">Payments You Entered Before</div>
                      <div class="card-body">

                        @foreach($payments as $payment)
                        <input required type="radio" name="payment_id" value="{{ $payment->id }}"> {{ $payment->card_number }} <br>
                        @endforeach
                        <a style="color: white;" href="{{ route('paymentCreate') }}">Add New Payment</a>
                       
                      </div>
                    </div>

              <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                     
                    <strong><span>CHECKOUT INFO</span></strong><br><br>
                    @foreach($cart as $c)
                    <span>{{ $c->product->first()->name }} </span> <span><strong> Price : </strong>{{ $c->product->first()->price }}$ </span> <span> <strong>Quantity</strong> X {{ $c->quantity }}</span><br>

                    @endforeach
                    <hr>
                    <strong>TOTAL : {{ $total }}$</strong><br><br>
                  </div>
                </div>
              </div>

                     
                     <input type="number" name="total" hidden value="{{ $total }}"> 
                     <button id="submit_form" type="submit" class="btn btn-block btn-primary wide"><i class="fa fa-send"></i>Finish The Order</button><br>

                    </div>
                  </div>
                </div>


                </form>



@endsection
