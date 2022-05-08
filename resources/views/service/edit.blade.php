@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Updata Service
                <a href="{{url('admin/service')}}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <h4 class="text-success">{{session('success')}}</h4>
            @endif
            <div class="table-responsive">
                <form action="{{url('admin/service/'.$data->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered">
                        <tr>
                            <th>Title <span class="text-danger">*</span></th>
                            <td><input type="text" class="form-control" name="title" value="{{$data->title}}">
                            </td>
                        </tr>
                        <tr>
                            <th> Small Description <span class="text-danger">*</span></th>
                            <td><textarea  class="form-control" name="small_desc" >{{$data->small_desc}}</textarea></td>
                        </tr>
                        <tr>
                            <th>Detail Description <span class="text-danger">*</span></th>
                            <td><textarea class="form-control" name="detail_desc" >{{$data->detail_desc}}</textarea></td>
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

                            <td><input type="Submit" class="btn btn-primary" name="value"></td>
                        </tr>

                    </table>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection

