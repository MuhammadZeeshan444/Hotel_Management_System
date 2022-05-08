@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Banner
                <a href="{{url('admin/banner')}}" class="float-right btn-success btn-sm">View All</a>
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
                <form action="{{url('admin/banner')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Banner Images<span class="text-danger">*</span></th>
                            <td><input type="file" name="banner_src"></td>
                        </tr>
                        <tr>
                            <th>Alt Text<span class="text-danger">*</span></th>
                            <td><input type="text" class="form-control" name="alt_text" value="">
                            </td>
                        </tr>
                        <tr>
                            <th>Publish Status</th>
                            <td><input type="checkbox" name="publish_status">
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

