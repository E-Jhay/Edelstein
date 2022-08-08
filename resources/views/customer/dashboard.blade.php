@extends('layouts.app')
@section('styles')
{{-- 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"> --}}
    <style>
        .bg-white {
            background: #fff !important;
            box-shadow: 0 3px 1rem rgba(0, 0, 0, 0.1);
        }
        .fa-bars {
            color: #122620 !important;
        }
        .order{
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
        .orders{
            margin-top: 5rem;
        }
    </style>
@endsection
@section('content')
<div class="container orders">
    <div class="alert alert-success">
    </div>
    <div class="alert alert-danger">
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">My Orders</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Payment Method</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr id="row{{$order->id}}">
                                <td>
                                    <img src="{{url('/storage/images/'.$order->product->image1)}}" alt="" class="img-thumbnail" width="50" height="35">
                                </td>
                                <td>{{$order->product->name}}</td>
                                <td>{{$order->total_price}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->payment_method}}</td>
                                <td>{{$order->product->category->category_name}}</td>
                                <td>{{$order->status}}</td>
                                <td class="text-center">
                                    @if ($order->status == 'pending')
                                        <a id="{{$order->id}}" class="btn btn-danger">
                                            <i class="fas fa-trash text-gray-400"></i> Cancel
                                        </a>
                                    @endif

                                    @if ($order->status == 'process')
                                        <a id="{{$order->id}}" href="/show-product/{{$order->product->id}}" class="btn btn-primary show">
                                            <i class="fas fa-eye text-gray-400"></i> Show
                                        </a>
                                    @endif

                                    @if ($order->status == 'delivered')
                                        <h5 class="bg-success">Delivered</h5>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script> --}}
<script>
    $(document).ready(function(){
        $('.btn-danger').on("click", function(e){
            e.preventDefault();
            const id = $(this).attr('id');
            console.log(id);
            if(confirm("Are you sure you want to cancel this order?")){
                $.ajax({
                    url: "order/"+id,
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
            }else{
                e.preventDefault();
                return false;
            }
        });

        // $('.btn-success').on("click", function(e){
        //     // console.log("dcdwdc");
        //     e.preventDefault();
        //     const id = $(this).attr('id');
        //     // console.log(id);
        //     if(confirm("Are you sure you want to accept this?")){
        //         $.ajax({
        //             url: "order/"+id,
        //             type: "PUT",
        //             data: {
        //                 "_token": "{{ csrf_token() }}",
        //                 id: id
        //             },
        //             success:function(response){
        //                 if(response.success){
        //                     $('.alert-success').fadeIn();
        //                     $('.alert-success').text(response.success);
        //                     setTimeout(function() {
        //                         $('.alert-success').fadeOut();

        //                     }, 3000);
        //                     $('#row'+id).remove();
        //                 }
        //                 else{
        //                     console.log('error');
        //                 }
        //             }

        //         });
        //     }else{
        //         e.preventDefault();
        //     }
        // });
        
    });
</script>
@endsection