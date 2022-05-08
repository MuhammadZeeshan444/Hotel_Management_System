@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$data->full_name}}
                <a href="{{url('admin/staff')}}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">

                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td>{{$data->full_name}}</td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td>{{$data->department->title}}</td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td><img width="70px" src="{{asset('img/'.$data->photo)}}" alt="photo"></td>
                        </tr>
                        <tr>
                            <th>Bio</th>
                            <td>{{$data->bio}}</td>
                        </tr>
                        <tr>
                            <th>Salary</th>
                            <td>{{$data->salary_type}}</td>
                        </tr>
                        <tr>
                            <th>Salary Amount</th>
                            <td>{{$data->salary_amount}}</td>
                        </tr>
                    </table>

            </div>
        </div>
    </div>

</div>

@endsection

