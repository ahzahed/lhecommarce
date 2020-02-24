@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css') }}">
@php
    $setting=DB::table('settings')->first();
    $charge=$setting->shipping_charge;
@endphp
<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart_container">
                    <div class="cart_title">Checkout</div>
                    <div class="cart_items">
                        <ul class="cart_list">
                            @foreach ($cart as $cart)
                            <li class="cart_item clearfix">
                                <div class="cart_item_image"><img src="{{ asset($cart->options->image) }}" height="100px" alt=""></div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Name</div>
                                        <div class="cart_item_text">{{ $cart->name }}</div>
                                    </div>
                                    @if ($cart->options->color==NULL)
                                    @else
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">Color</div>
                                        <div class="cart_item_text"><span style="background-color:#999999;"></span>{{ $cart->options->color }}</div>
                                    </div>
                                    @endif
                                    
                                    @if ($cart->options->size==NULL)
                                    @else
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">Size</div>
                                        <div class="cart_item_text"><span style="background-color:#999999;"></span>{{ $cart->options->size }}</div>
                                    </div>
                                    @endif
                                    <div class="cart_item_quantity cart_info_col">
                                        <div class="cart_item_title">Quantity</div>
                                        {{--  <div class="cart_item_text">{{ $cart->qty }}</div>  --}}
                                        <form action="{{route('update.cartitem')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$cart->rowId}}">
                                            <input type="number" name="qty" value="{{ $cart->qty }}" width="40px" height="30px">
                                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check-square"></i></button>
                                        </form>
                                    </div>
                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title">Price</div>
                                        <div class="cart_item_text">${{ $cart->price }}</div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Total</div>
                                        <div class="cart_item_text">${{ $cart->price*$cart->qty }}</div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Action</div>
                                        <a href="{{url('remove/cart/'.$cart->rowId)}}" class="btn btn-sm btn-danger">X</a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <!-- Order Total -->
                    <div class="order_total_content " style="padding: 14px;">
                        @if(Session::has('coupon'))
                        @else
                           <h5>Apply Coupon</h5>
                           <form action="{{ route('apply.coupon') }}" method="post">
                               @csrf
                                <div class="form-group col-lg-4">
                                    <input type="text" class="form-control" name="coupon" required=""  aria-describedby="emailHelp" placeholder="Coupon Code">
                                 </div>
                                 <button type="submit" class="btn btn-danger ml-2">submit</button>
                           </form>
                           @endif
                     </div>
              
                  <ul class="list-group col-lg-4" style="float: right;">
                        @if(Session::has('coupon'))
                             <li class="list-group-item">Subtotal :  <span style="float: right;"> $ {{ Session::get('coupon')['balance'] }}</span> </li>
                              <li class="list-group-item">Coupon : ({{   Session::get('coupon')['name'] }}) <a href="{{ route('remove.coupon') }}" class="btn btn-danger btn-sm">x</a> <span style="float: right;"> $  {{ Session::get('coupon')['discount'] }} </span> </li>
                            @else
                              <li class="list-group-item">Subtotal :  <span style="float: right;"> $ {{ Cart::Subtotal() }}</span> </li>
                            @endif
                        


                        <li class="list-group-item">Shipping Charge: <span style="float: right;"> $ {{ $charge }}</span></li>
                        <li class="list-group-item">Vat :  <span style="float: right;"> 0</span></li>
                        @if(Session::has('coupon'))
                        <li class="list-group-item">Total:  <span style="float: right;"> $ {{ Session::get('coupon')['balance'] + $charge }}</span> </li>
                        @else
                             <li class="list-group-item">Total:  <span style="float: right;">$ {{ Cart::Subtotal() + $charge }} </span> </li>
                        @endif
                  </ul>
              </div>
                 
      
          </div>
      </div>
             <div class="cart_buttons">
              <a href="{{ route('show.cart') }}" class="button cart_button_clear">Back</a>
              {{--  <a href="{{ route('payment.step') }}" class="button cart_button_checkout">Final Step</a>  --}}
         </div>
  </div>

</div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter -->

<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                    <div class="newsletter_title_container">
                        <div class="newsletter_icon"><img src="images/send.png" alt=""></div>
                        <div class="newsletter_title">Sign up for Newsletter</div>
                        <div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
                    </div>
                    <div class="newsletter_content clearfix">
                        <form action="#" class="newsletter_form">
                            <input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
                            <button class="newsletter_button">Subscribe</button>
                        </form>
                        <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('public/frontend/js/cart_custom.js') }}"></script>
@endsection