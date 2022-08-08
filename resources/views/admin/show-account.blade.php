@extends('layouts.adminLayout')
@section('styles')
    <link href="{{ asset('css/customer.css') }}" rel="stylesheet">
@endsection
@section('content')

<a href="/account" class=" btn btn-outline-secondary">Go Back</a>
<div class="card o-hidden border-0 shadow-lg my-4">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="register-image">
                <img src="{{asset('img/register.svg')}}" alt="">
            </div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Update Account</h1>
                    </div>
                    <form class="user">
                        <div class="form-group">
                            <img src="{{url('/storage/images/'.$account->image)}}" alt="" class="rounded" width="60" height="60">
                        </div>
                        <div class="form-group">
                            <input id="full_name" type="text" class="form-control form-control-user @error('full_name') is-invalid @enderror" name="full_name" value="{{ $account->full_name }}" required autocomplete="full_name" disabled>
                        </div>
                        <div class="form-group">
                            <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ $account->email }}" required autocomplete="email" disabled>
                        </div>
                        <div class="form-group">
                            <input id="phone" type="number" class="form-control form-control-user @error('phone') is-invalid @enderror" name="phone" value="{{ $account->phone }}" required autocomplete="phone" disabled>
                        </div>
                        <div class="form-group">
                            <input id="address" type="text" class="form-control form-control-user @error('address') is-invalid @enderror" name="address" value="{{ $account->address }}" disabled>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6"> 
                                <a href="/account/{{$account->id}}/edit" class="btn btn-warning">Edit</a>
                                <a class="btn btn-danger float-right" href="#" data-toggle="modal" data-target="#deleteModal">
                                    <i class="fas fa-trash-alt text-gray-400"></i>
                                    Delete
                                </a>
                            </div>
                        </div>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel11">Are you sure you want to delete this?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select Yes if you are sure.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="/account/{{$account->id}}" method="POST">
                        {{csrf_field()}}
                        @method('Delete')
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
            </div>
        </div>
    </div>
</div>  
@endsection