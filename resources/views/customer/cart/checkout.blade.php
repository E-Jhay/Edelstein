@extends('layouts.app')
@section('styles')
    <link href="{{ asset('css/checkout.css') }}" rel="stylesheet">
    <style>
        .bg-white {
            background: #fff !important;
            box-shadow: 0 3px 1rem rgba(0, 0, 0, 0.1);
        }
        .fa-bars {
            color: #122620 !important;
        }
        .product{
            margin-top: 4rem;
        }
        .bg-white .navbar-brand,
        .bg-white .nav-link,
        .text-light {
            color: #122620 !important;
        }
        .alert-success, .alert-danger{
            color: black;
            z-index: 10000;
            display: none;
            font-weight: 450;
            width: 350px;
            position: fixed;
            top: 20%;
            left: 13%;
            padding: 5px 20px;
        }
    </style>
@endsection
@section('content')
<div class="alert alert-success">
</div>
<div class="alert alert-danger">
</div>
    <div class="container px-4 py-5 mx-auto product">
        <a href="{{ url()->previous() }}"  class="btn btn-outline-secondary mb-3">Back</a>
        <div class="row d-flex justify-content-center">
            <div class="col-5">
                <h4 class="heading">Shopping Bag</h4>
            </div>
            <div class="col-7">
                <div class="row text-right">
                    <div class="col-4">
                        <h6 class="mt-2">Category</h6>
                    </div>
                    <div class="col-4">
                        <h6 class="mt-2">Quantity</h6>
                    </div>
                    <div class="col-4">
                        <h6 class="mt-2">Price</h6>
                    </div>
                </div>
            </div>
        </div>
        @if (count($checked_array) > 0)
            @foreach ($checked_array as $key => $value)
    
            <div class="row d-flex justify-content-center border-top">
                <div class="col-5">
                    <div class="row d-flex">
                        <div class="book"> <img src="{{url('/storage/images/'.$images[$key])}}" class="book-img"> </div>
                        <div class="my-auto flex-column d-flex pad-left">
                            <h6 class="mob-text">{{$product_name[$key]}}</h6>
                            <input type="hidden" name="prodid[]" value="{{$prodid[$key]}}">
                            <input type="hidden" name="images[]" value="{{$images[$key]}}">
                            <input type="hidden" name="quantity[]" value="{{$quantity[$key]}}">
                            <input type="hidden" name="price[]" value="{{$total_price[$key]}}">
                            <input type="hidden" name="total_all" id="total_all" value="{{$total_all}}">
                        </div>
                    </div>
                </div>
                <div class="my-auto col-7">
                    <div class="row text-right">
                        <div class="col-4">
                            <p class="mob-text">{{$product_category[$key]}}</p>
                        </div>
                        <div class="col-4">
                            <div class="row d-flex justify-content-end px-3">
                                <p class="mb-0" id="cnt1">{{$quantity[$key]}}</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <h6 class="mob-text">{{$total_price[$key]}}</h6>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="row">No Selected Item</div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-3 radio-group">
                            <div class="form-check">
                                <input class="form-check-input mt-4" type="radio" name="payment_method" id="flexRadioDefault1" value="paypal">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <div class="row d-flex px-3 radio gray"> <img class="pay" src="https://i.imgur.com/WIAP9Ku.jpg">
                                        <p class="my-auto ml-3">Paypal</p>
                                    </div>
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input mt-4" type="radio" name="payment_method" id="flexRadioDefault2" value="cod" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    <div class="row d-flex px-3 radio"> <img class="pay" src="{{url('/storage/images/COD.png')}}">
                                        <p class="my-auto ml-3">COD</p>
                                    </div>
                                </label>
                              </div>
                            
                            {{-- <div class="row d-flex px-3 radio gray mb-3"> <img class="pay" src="https://i.imgur.com/cMk1MtK.jpg">
                                <p class="my-auto">PayPal</p>
                            </div> --}}
                        </div>
                        <div class="col-lg-5">
                            <div class="row px-2 py-4">
                                <div class="form-group col-md-9"> <label class="form-control-label">Shipping Address</label> <input type="text" id="cname" name="shipping_address" value="{{Auth::user()->address}}"> </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-2">
                            <div class="row d-flex justify-content-between px-4">
                                <p class="mb-1 text-left">Subtotal</p>
                                <h6 class="mb-1 text-right sub_total">${{$sub_total}}</h6>
                            </div>
                            <div class="row d-flex justify-content-between px-4">
                                <p class="mb-1 text-left">Shipping</p>
                                <h6 class="mb-1 text-right shipping_fee">${{$shipping_fee}}</h6>
                            </div>
                            <div class="row d-flex justify-content-between px-4" id="tax">
                                <p class="mb-1 text-left">Total</p>
                                <h6 class="mb-1 text-right total">${{$total_all}}</h6>
                            </div> <button id="submit" class="btn-block btn-blue"> <span> <span id="checkout">Place Order</span> <span id="check-amt">${{$total_all}}</span> </span> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            $('.radio-group .radio').click(function(){
                $('.radio').addClass('gray');
                $(this).removeClass('gray');
            });

            $('#submit').on("click", function(e){
        
                e.preventDefault();
                let prodid = [];
                let quantity = [];
                let price = [];
                let shipping_address;
                let total_all;
                let payment_method;

                
                
                $('input[name^="prodid"]').each(function(){
                    prodid.push($(this).val());
                });
                
                $('input[name^="quantity"]').each(function(){
                    quantity.push($(this).val());
                });
                $('input[name^="price"]').each(function(){
                    price.push($(this).val());
                });
                shipping_address = $('#cname').val();
                total_all = $('#total_all').val();
                payment_method = $('input[name="payment_method"]:checked').val();
                $.ajax({
                    url: "{{ route('placeOrder')}}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        prodid: prodid,
                        quantity: quantity,
                        price: price,
                        shipping_address: shipping_address,
                        total_all: total_all,
                        payment_method: payment_method
                    },
                    success:function(response){
                        if(response.success){
                            window.location.href= "/dashboard";
                        }
                        // else if(response.error){
                        //     $('.alert-danger').fadeIn();
                        //     $('.alert-danger').text(response.error);
                        //     setTimeout(function() {
                        //         $('.alert-danger').fadeOut();
                        //     }, 3000);
                        // }
                        
                    }
                            
                });
                
            });

        });
    </script>
@endsection