@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$data->title}}
                <a href="{{url('admin/roomtype')}}" class="float-right btn-success btn-sm">View All</a>
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
                            <th>Price</th>
                            <td>{{$data->price}}</td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td>{{$data->detail}}</td>
                        </tr>
                        <tr>
                            <th>Room Images</th>
                            <td>
                                <table>
                                    <tr>
                                        @foreach ($data->roomtypeimage as $rti)
                                        <td><img width="100px" src="{{asset($rti->img_src)}}" alt="{{$rti->img_alt}}">
                                        </td>
                                        @endforeach
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

            </div>
        </div>
    </div>

</div>

@endsection

