@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Room
                <a href="{{url('admin/rooms')}}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">

                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td>{{$data->title}}</td>
                        </tr>
                        <tr>
                            <th>RoomType</th>
                            <td>{{$data->roomtype->title}}</td>
                        </tr>
                    </table>

            </div>
        </div>
    </div>

</div>

@endsection

