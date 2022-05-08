@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Updata {{$data->full_name}}
                <a href="{{url('admin/staff')}}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <h4 class="text-success">{{session('success')}}</h4>
            @endif
            <div class="table-responsive">
                <form enctype="multipart/form-data" action="{{url('admin/staff/'.$data->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name</th>
                            <td><input type="text" name="full_name" class="form-control" value="{{$data->full_name}}" ></td>
                        </tr>
                        <tr>
                            <th>Select Department</th>
                            <td>
                                <select name="department_id" id="" class="form-control">
                                    <option value="">--- Select ---</option>
                                    @foreach ($staffDeparts as $departs)
                                        <option @if($data->id==$departs->id) selected @endif  value="{{$departs->id}}" style="color: black">{{$departs->title}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td>
                                <input type="file" name="photo">
                                <input type="hidden" name="prev_photo" value="{{$data->photo}}">
                                <img width="100px" src="{{(asset('img/'.$data->photo))}}" alt="photo"/>
                            </td>
                        </tr>
                        <tr>
                            <th>Bio</th>
                            <td><textarea name="bio" id="" class="form-control" >{{$data->bio}}</textarea></td>
                        </tr>
                        <tr>
                            <th>Salary Type</th>
                            <td>
                                <input @if ($data->salary_type=='daily')checked  @endif type="radio" name="salary_type" class="form-group text-bold" id="" value="daily">Daily

                                <input @if ($data->salary_type=='monthly')checked  @endif type="radio" name="salary_type" class="form-group" id="" value="monthly">Monthly
                            </td>
                        </tr>
                        <tr>
                            <th>Salary Amount</th>
                            <td><input type="number" name="salary_amount" class="form-control" value="{{$data->salary_amount}}" ></td>
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

