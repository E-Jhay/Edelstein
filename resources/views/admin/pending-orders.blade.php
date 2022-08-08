@extends('layouts.adminLayout')
@section('styles')
    <style>
        .alert-success, .alert-danger{
            color: black;
            z-index: 10000;
            display: none;
            font-weight: 450;
            width: 350px;
            position: fixed;
            top: 20%;
            left: 17%;
            padding: 5px 20px;
        }
    </style>
@endsection
@section('content')
    <div class="alert alert-success">
    </div>
    <div class="alert alert-danger">
    </div>
    <h1 class="h3 mb-2 text-gray-800">Pending Orders</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pending Orders</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead  class="bg-primary text-light">
                        <tr>
                            <th>Id</th>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Order Date</th>
                            <th>Total Price</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pending_orders as $pending_order)
                            <tr id="row{{$pending_order->id}}">
                                <td>{{$pending_order->id}}</td>
                                <td>{{$pending_order->user->full_name}}</td>
                                <td>{{$pending_order->product->name}}</td>
                                <td>{{$pending_order->quantity}}</td>
                                <td>{{$pending_order->created_at}}</td>
                                <td>{{$pending_order->product->regular_price*$pending_order->quantity}}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a id="{{$pending_order->id}}" class="btn btn-success">
                                            <i class="fas fa-check text-gray-400"></i>Accept
                                        </a>
                                        <a id="{{$pending_order->id}}" class="btn btn-danger ml-2">
                                            <i class="fas fa-trash-alt text-gray-400"></i>Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
<script>

    $(document).ready(function(){
        $('.btn-danger').on("click", function(e){
            e.preventDefault();
            const id = $(this).attr('id');
            // console.log(id);
            if(confirm("Are you sure you want to delete this?")){
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

        $('.btn-success').on("click", function(e){
            // console.log("dcdwdc");
            e.preventDefault();
            const id = $(this).attr('id');
            // console.log(id);
            if(confirm("Are you sure you want to accept this?")){
                $.ajax({
                    url: "order/"+id,
                    type: "PUT",
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
                            console.log('error');
                        }
                    }

                });
            }else{
                e.preventDefault();
            }
        });
        
    });
    // $( ".btn-danger" ).each(function(index) {
    //     $(this).on("click", function(e){
    //         if(confirm("Are you sure you want to delete this?")){
    //             return true;
    //         }else{
    //             e.preventDefault();
    //             return false;
    //         }
    //     });
    // });
    // $( ".btn-success" ).each(function(index) {
    //     $(this).on("click", function(e){
    //         if(confirm("Are you sure you want to accept this?")){
    //             return true;
    //         }else{
    //             e.preventDefault();
    //             return false;
    //         }
    //     });
    // });
</script>
@endsection