@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cutomers
                <a href="{{url('admin/customer/create')}}" class="float-right btn-success btn-sm">Add New</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (Session::has('success'))
                <h4 class="text-success">{{session('success')}}</h4>
            @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if ($data)
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->full_name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->mobile}}</td>
                                <td>{{$item->address}}</td>
                                <td>
                                    <a href="{{url('admin/customer/'.$item->id)}}" class="btn btn-info btn-sm btn-circle"><i class="fa fa-eye"></i></a>
                                    <a href="{{url('admin/customer/'.$item->id).'/edit'}}" class="btn btn-primary btn-sm btn-circle"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Are your sure want to delete this?')" href="{{url('admin/customer/'.$item->id).'/delete'}}" class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@section('script')
<!-- Custom styles for this template -->
<link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<!-- Page level plugins -->
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
<!-- /.container-fluid -->
@endsection

@endsection

