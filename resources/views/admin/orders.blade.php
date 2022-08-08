@extends('layouts.adminLayout')
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Orders</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th>ID</th>
                            <th>Customer ID</th>
                            <th>Product ID</th>
                            <th>Quantity</th>
                            <th>Order Date</th>
                            <th>Shipping Address</th>
                            <th>Payment Method</th>
                            <th>Total Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function(){
            $('#dataTable').DataTable({
                "processing": true,
                "serverside": true,
                "ajax": "{{route('getAllOrders')}}",
                "columns": [
                    {"data": "id"},
                    {"data": "user_id"},
                    {"data": "product_id"},
                    {"data": "quantity"},
                    {"data": "created_at"},
                    {"data": "total_price"},
                    {"data": "shipping_address"},
                    {"data": "payment_method"},
                    {"data": "status"}
                ]
            })
        })
    </script>
@endsection