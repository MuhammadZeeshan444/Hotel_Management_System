@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Customer
                <a href="{{url('admin/customer')}}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                @endforeach
            @endif
            @if (Session::has('success'))
                <h4 class="text-success">{{session('success')}}</h4>
            @endif
            <div class="table-responsive">
                <form action="{{url('admin/customer')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name <span class="text-danger">*</span></th>
                            <td><input type="text" class="form-control" name="full_name" value="">
                            </td>
                        </tr>
                        <tr>
                            <th>Email <span class="text-danger">*</span></th>
                            <td><input type="email" class="form-control" name="email"></td>
                        </tr>
                        <tr>
                            <th>Password <span class="text-danger">*</span></th>
                            <td><input type="password" class="form-control" name="password"></td>
                        </tr>
                        <tr>
                            <th>Mobile <span class="text-danger">*</span></th>
                            <td><input type="text" class="form-control" name="mobile"></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><input type="text" class="form-control" name="address"></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td><input type="file" name="photo"></td>
                        </tr>
                        <tr>

                            <td><input type="Submit" class="btn btn-primary" name="value"></td>
                        </tr>

                    </table>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection

