@extends('layouts.adminLayout')
{{-- @section('styles')
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
@endsection --}}
@section('content')

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Categories</h1>
        <div align="right">
            <button type="button" class="btn btn-primary my-4" data-toggle="modal" data-target="#exampleModal">Add category</button>
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
                <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th class="text-center col-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->category_name}}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="/category/{{$category->id}}" class="btn btn-success">Update</a>
                                        <form method="POST" class="ml-2" action="/category/{{$category->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash-alt text-gray-400"></i>Delete
                                            </button>
                                        </form>
                                        
                                    </td>
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
          <h5 class="modal-title" id="exampleModalLabel">Add category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body">
                <form method="POST" action="{{ action('CategoryController@store') }}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="category" value="{{ old('category') }}" required autocomplete="category" autofocus placeholder="Category Name">
                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Create') }}
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
<script>
    // document.querySelector(".btn-danger").addEventListener("click", (e) => {

    //     if(confirm("Are you sure you want to delete this?")){
    //         return true;
    //     }else{
    //         e.preventDefault();
    //         return false;
    //     }
    // });
    $( ".btn-danger" ).each(function(index) {
        $(this).on("click", function(e){
            if(confirm("Are you sure you want to delete this?")){
                return true;
            }else{
                e.preventDefault();
                return false;
            }
        });
    });
</script>
@endsection