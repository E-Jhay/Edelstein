@extends('layouts.app')
@section('styles')
<style>
    .bg-white {
        background: #fff !important;
        box-shadow: 0 3px 1rem rgba(0, 0, 0, 0.1);
    }
    .shop{
        background-color: #fff;
        height: auto;
    }
    .fa-bars {
        color: #122620 !important;
    }
    .bg-white .navbar-brand,
    .bg-white .nav-link,
    .text-light {
        color: #122620 !important;
    }
    .cart-list{
        padding-left: 7rem;
        padding-top: 6rem;
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

    .message {
        color: red
    }
</style>
@endsection
@section('content')
<div class="cart-list">
    
    <div class="container">
        <a href="/home" class="btn btn-outline-secondary mb-3">Back</a>
            <div class="col-sm-12 col-md-11 col-md-offset-1">
                    <div class="alert alert-success">
                    </div>
                    <div class="alert alert-danger">
                    </div>
                    @if($errors->any())
                        <div class="message">
                            {{$errors->first()}}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    @endif
                    <form action="{{action('OrderController@checkout')}}" method="POST">
                        @csrf

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Total</th>
                                    <th class="col-1"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($cart_lists) > 0)
                                    @foreach ($cart_lists as $cart_list)
                                    <tr id="row{{$cart_list->id}}">
                                        <td class="col-sm-1 col-md-1 text-center ml-5">
                                            <input type="checkbox" class="cart_id" name="cart_id[]" class="form-check-input" value="{{$cart_list->id}}">
                                            <input type="hidden" class="prodname" name="prodname[]" value="{{$cart_list->id}}"><input type="hidden" name="prodid[]" class="form-control prodid" value="{{$cart_list->product_id}}">
                                        </td>
                                        <td class="col-sm-8 col-md-6">
                                        <div class="media"><img class="media-object" src="{{url('/storage/images/'.$cart_list->product->image1)}}" style="width: 75px; height: 65px;">
                                            <div class="media-body">
                                                <h4 class="media-heading ml-2">{{$cart_list->product->name}}</h4>
                                            </div>
                                        </div></td>
                                        <td class="col-sm-1 col-md-1" style="text-align: center">
                                        <input type="number" name="quantity[]" class="form-control quantity" value="{{$cart_list->quantity}}">
                                        </td>
                                        <td class="col-sm-1 col-md-1 text-center"><strong>${{$cart_list->price}}</strong></td>
                                        <td class="col-sm-1 col-md-1 text-center"><strong>${{$cart_list->amount}}</strong></td>
                                        <td class="col-sm-1 col-md-2 text-center">
                                            <a class="btn btn-danger" id="{{$cart_list->id}}">
                                                <i class="fas fa-trash-alt text-gray-400"></i>Remove</a></td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td>   </td>
                                        <td>   </td>
                                        <td>   </td>
                                        <td>   </td>
                                        <td>
                                        <a href="/home" class="btn btn-default">
                                            <i class="fas fa-shopping-cart"></i> Continue Shopping
                                        </a></td>
                                        <td class="text-center"><button type="submit" class="btn btn-success">Checkout</button></td>
                                @else
                                <td>   </td>
                                <td>   </td>
                                <td>No Items yet</td>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                @endif
                                </tr>
                            </tbody>
                        </table>
                    </form>
            </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    
    setTimeout(function() {
        $('.alert').hide();

    }, 3000);
    
    $(document).ready(function(){
        // $('.btn-success').on("click", function(e){
        
        //     e.preventDefault();
        //     const cart_id = [];
        //     const quantity = [];
        //     const prodname = [];
        //     const prodid = [];

        //     $('.cart_id').each(function(){
        //         if($(this).is(':checked'))
        //         {
        //             cart_id.push($(this).val());
        //         }
        //     });
        //     $('.prodname').each(function(){
        //         prodname.push($(this).val());
        //     });
        //     $('input[name^="quantity"]').each(function(){
        //         quantity.push($(this).val());
        //     });
        //      $('input[name^="prodid"]').each(function(){
        //         prodid.push($(this).val());
        //     });
            
            
        //     $.ajax({
        //         url: "{{ route('checkout')}}",
        //         type: "POST",
        //         data: {
        //             "_token": "{{ csrf_token() }}",
        //             cart_id: cart_id,
        //             quantity: quantity,
        //             prodname: prodname,
        //             prodid: prodid
        //         },
        //         success:function(response){
        //             if(response.success){
        //                 $('.alert-success').fadeIn();
        //                 $('.alert-success').text(response.success);
        //                 setTimeout(function() {
        //                     $('.alert-success').fadeOut();
        //                 }, 3000);
        //             }
        //             else if(response.error){
        //                 $('.alert-danger').fadeIn();
        //                 $('.alert-danger').text(response.error);
        //                 setTimeout(function() {
        //                     $('.alert-danger').fadeOut();
        //                 }, 3000);
        //             }
        //             window.location.href= "{{route('checkout')}}";
        //         }
                        
        //     });
            
        // });

        $('.btn-danger').on("click", function(e){
            // console.log("dcdwdc");
            e.preventDefault();
            const id = $(this).attr('id');
            // console.log(id);

            $.ajax({
                url: "cart_list/"+id,
                type: "DELETE",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id
                },
                success:function(response){
                    if(response.success){
                        $('.alert-success').fadeIn();
                        $('.alert-success').text(response.success);
                        setTimeout(function() {
                            $('.alert-success').fadeOut();
                        }, 3000);
                        
                        $('#row'+id).remove();
                    }
                    else{
                        $('.alert-danger').fadeIn();
                        $('.alert-danger').text(response.error);
                        setTimeout(function() {
                            $('.alert-danger').fadeOut();
                        }, 3000);
                    }
                }

            });

        });

    });
    

</script>    
@endsection
