@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Updata Room
                <a href="{{url('admin/rooms')}}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <h4 class="text-success">{{session('success')}}</h4>
            @endif
            <div class="table-responsive">
                <form action="{{url('admin/rooms/'.$data->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered">
                        <tr>
                            <th>Select Roomtype</th>
                            <td>
                                <select name="rt_id" id="" class="form-control">
                                    <option value="">--- Select ---</option>
                                    @foreach ($roomtype as $rt)
                                        <option @if ($data->room_type_id==$rt->id)
                                            selected
                                        @endif value="{{$rt->id}}" style="color: black">{{$rt->title}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td><input type="text" class="form-control" name="title" value="{{$data->title}}"></td>
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

