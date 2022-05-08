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

            <div class="table-responsive">

                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Photo</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                        </tr>
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->full_name}}</td>
                            <td><img  width="100px" src="{{asset('img/'.$data->photo)}}" alt="photo"></td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->mobile}}</td>
                            <td>{{$data->address}}</td>
                        </tr>
                    </table>

            </div>
        </div>
    </div>

</div>

@endsection

