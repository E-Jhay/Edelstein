@extends('layouts.adminLayout')
{{-- @section('styles')
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
@endsection --}}
@section('content')

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Accounts</h1>
        <div align="right">
            <button type="button" class="btn btn-primary my-4" data-toggle="modal" data-target="#addAccountModal">Add Accounts</button>
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
                <h6 class="m-0 font-weight-bold text-primary">Accounts</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th>Image</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accounts as $account)
                                <tr>
                                    <td>
                                        <img src="{{url('/storage/images/'.$account->image)}}" alt="" class="img-thumbnail" width="50" height="35">
                                    </td>
                                    <td>{{$account->full_name}}</td>
                                    <td>{{$account->email}}</td>
                                    <td>{{$account->phone}}</td>
                                    <td>{{$account->role}}</td>
                                    <td>{{$account->address}}</td>
                                    <td class="text-center"><a href="/account/{{$account->id}}" class="btn btn-success">Show</a></
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="float-right">
                    {!! $accounts->links() !!}
                </div>
            </div>
        </div>


    <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="addAccountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body">
                <form class="user" method="POST" action="{{ action('AccountController@store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input id="full_name" type="text" class="form-control form-control-user @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" autofocus placeholder="Full Name">
                        @error('full_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="phone" type="number" class="form-control form-control-user @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Phone Number">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="address" type="text" class="form-control form-control-user @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="phone" autofocus placeholder="Address">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <select class="form-select" name="role" aria-label="role" required>
                                <option value="">Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="customer">Customer</option>
                              </select>
                            @error('category')
                                <span class="text-danger" class="text-danger">{{$message}}</span class="text-danger">
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="form-label" for="image">Image</label>
                        <input type="file" class="form-control-sm @error('image') is-invalid @enderror" id="image" name="image"/>
                        @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        {{ __('Register') }}
                    </button>
                </form>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script type="text/javascript" language="javascript" >
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
@endsection