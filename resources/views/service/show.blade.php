@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$data->title}}
                <a href="{{url('admin/service')}}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">

                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Small Description</th>
                            <th>Detail Description</th>
                            <th>Photo</th>
                        </tr>
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->title}}</td>
                            <td>{{$data->small_desc}}</td>
                            <td>{{$data->detail_desc}}</td>
                            <td><img  width="100px" src="{{asset('img/'.$data->photo)}}" alt="photo"></td>
                        </tr>
                    </table>

            </div>
        </div>
    </div>

</div>

@endsection

