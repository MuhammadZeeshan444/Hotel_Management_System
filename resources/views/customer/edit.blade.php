@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Updata Customer
                <a href="{{url('admin/customer')}}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <h4 class="text-success">{{session('success')}}</h4>
            @endif
            <div class="table-responsive">
                <form action="{{url('admin/customer/'.$data->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name <span class="text-danger">*</span></th>
                            <td><input type="text" class="form-control" name="full_name" value="{{$data->full_name}}">
                            </td>
                        </tr>
                        <tr>
                            <th>Email <span class="text-danger">*</span></th>
                            <td><input type="email" class="form-control" name="email" value="{{$data->email}}"></td>
                        </tr>
                        <tr>
                            <th>Password <span class="text-danger">*</span></th>
                            <td><input type="password" class="form-control" name="password" value="{{$data->password}}"></td>
                        </tr>
                        <tr>
                            <th>Mobile <span class="text-danger">*</span></th>
                            <td><input type="text" class="form-control" name="mobile" value="{{$data->mobile}}"></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><textarea name="address" id="" cols="40" rows="3" >{{$data->address}}</textarea></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td>
                            <input type="file" name="banner_src">
                            <input type="hidden" name="prev_photo" value="{{$data->photo}}">
                            <img width="100px" src="{{(asset('img/'.$data->photo))}}" alt="photo"/>
                            </td>
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

