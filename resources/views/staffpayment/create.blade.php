@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add {{$data->full_name}} Payment
                <a href="{{url('admin/staff')}}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <h4 class="text-success">{{session('success')}}</h4>
            @endif
            <div class="table-responsive">
                <form  action="{{url('admin/staff/payment/'.$staff_id)}}" method="POST">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Staff Name</th>
                            <td>{{$data->full_name}}</td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td>{{$data->department->title}}</td>
                        </tr>
                        <tr>
                            <th>Salary Amount</th>
                            <td>
                                <input type="numbrt" name="amount" class="form-control" >
                            </td>
                        </tr>
                        <tr>
                            <th>Salary Date</th>
                            <td><input type="date" name="amount_date" class="form-control" ></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="" id="" class="btn btn-primary">

                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection

