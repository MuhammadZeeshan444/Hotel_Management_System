@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Updata banner
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
                <form action="{{url('admin/banner/'.$data->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered">
                        <tr>
                            <th>Banner Images<span class="text-danger">*</span></th>
                            <td>
                            <input type="file" name="banner_src">
                            <input type="hidden" name="prev_photo" value="{{$data->banner_src}}">
                            <img width="100px" src="{{(asset('img/'.$data->banner_src))}}" alt="photo"/>
                            </td>
                        </tr>
                        <tr>
                            <th>Alt Text<span class="text-danger">*</span></th>
                            <td><input type="text" class="form-control" name="alt_text" value="{{$data->alt_text}}">
                            </td>
                        </tr>
                        <tr>
                            <th>Publish Status</th>
                            <td><input @if($data->publish_status=='on') checked @endif type="checkbox" name="publish_status"></td>
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

