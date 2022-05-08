@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Roomtype
                <a href="{{url('admin/roomtype')}}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>
        @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                @endforeach
            @endif
        <div class="card-body">
            @if (Session::has('success'))
                <h4 class="text-success">{{session('success')}}</h4>
            @endif
            <div class="table-responsive">
                <form action="{{url('admin/roomtype')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td><input type="text" class="form-control" name="title"></td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td><input type="number" class="form-control" name="price"></td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td><textarea name="detail" id="" cols="15" rows="5" class="form-control" ></textarea></td>
                        </tr>
                        <tr>
                            <th>Choice Images</th>
                            <td><input type="file" multiple name="images[]" id=""></td>
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

