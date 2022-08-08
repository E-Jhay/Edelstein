@extends('layouts.adminLayout')
{{-- @section('styles')
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
@endsection --}}
@section('content')

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Products</h1>
        <div align="right">
            <button type="button" class="btn btn-primary my-4" data-toggle="modal" data-target="#exampleModal">Add Product</button>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Products</h6>
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
                                <th>Available Quantity</th>
                                <th>Category</th>
                                <th>Condition</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <img src="{{url('/storage/images/'.$product->image1)}}" alt="" class="img-thumbnail" width="50" height="35">
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->regular_price}}</td>
                                    <td>{{$product->quantity}}</td>
                                    @if ($product->quantity >=   $product->orders->sum('quantity'))
                                        <td>
                                            {{$product->quantity - $product->orders->sum('quantity')}}
                                        </td>
                                    @else
                                        <td>
                                            <div class="bg-red rounded">Not Available</div>
                                        </td>
                                    @endif
                                    <td>{{$product->category->category_name}}</td>
                                    <td>{{$product->condition}}</td>
                                    <td class="text-center"><a href="/product/{{$product->id}}" class="btn btn-success">Show</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ action('ProductController@store') }}" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="name" value="{{ old('name') }}" required autocomplete="productName" autofocus placeholder="Product Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea class="form-control form-control-user" name="description" placeholder="Product Description" rows="3" required>{{old('desciption')}}</textarea>
                    @error('description')
                        <span class="text-danger">{{$message}}</span class="text-danger">
                    @enderror
                </div>
                <div class="form-group">
                    <input type="number" class="form-control form-control-user" name="regular_price" value="{{ old('regular_price') }}" required autocomplete="phone" autofocus placeholder="Price">
                    @error('regular_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="number" class="form-control form-control-user" name="quantity" value="{{ old('quantity') }}" required autocomplete="phone" autofocus placeholder="Product Quantiity">
                    @error('quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-select" name="category" required>
                            <option value="">Select Category</option>
                            @if (empty($categories))
                                <option value="">No Categories</option>
                            @else
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->id. " - " .$category->category_name}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('category')
                            <span class="text-danger" class="text-danger">{{$message}}</span class="text-danger">
                        @enderror
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-select" name="condition" required>
                            <option value="">Product Condition</option>
                            <option value="default">Default</option>
                            <option value="hot">Hot</option>
                            <option value="new">New</option>
                        </select>
                        @error('condition')
                            <span class="text-danger" class="text-danger">{{$message}}</span class="text-danger">
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-sm-6">
                        <label class="form-label" for="image1">First Image</label>
                        <input type="file" class="form-control-sm @error('image1') is-invalid @enderror" id="image1" name="image1"/>
                        @error('image1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="image2">Second Image</label>
                        <input type="file" class="form-control-sm @error('image2') is-invalid @enderror" id="image2" name="image2"/>
                        @error('image2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Create') }}
                </button>
            </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection

{{-- @section('scripts') --}}
{{-- <script type="text/javascript" language="javascript" >
    $(document).ready(function(){

        fetchData();
        function fetchData(){
		$.ajax({
			type: "GET",
			url: "/fetch-data",
			dataType: "json",
			success: function(data){
                console.log(data.users)
            }
		})
	}
    });
    </script>
@endsection --}}