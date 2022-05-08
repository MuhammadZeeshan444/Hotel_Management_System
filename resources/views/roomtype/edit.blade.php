@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Updata {{$data->title}}
                <a href="{{url('admin/roomtype')}}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <h4 class="text-success">{{session('success')}}</h4>
            @endif
            <div class="table-responsive">
                <form action="{{url('admin/roomtype/'.$data->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td><input type="text" class="form-control" name="title" value="{{$data->title}}"></td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td><input type="number" class="form-control" name="price" value="{{$data->price}}"></td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td><textarea name="detail" id="" cols="15" rows="5" class="form-control"  >{{$data->detail}} </textarea></td>
                        </tr>
                        <tr>
                            <th>Room Images</th>
                            <td>
                                <table>
                                    <tr>
                                        <input type="file" multiple class="form-control mt-5" name="images[]" id="">
                                        @foreach ($data->roomtypeimage as $rti)
                                        <td class="imgcol{{$rti->id}}">
                                            <img width="100px" src="{{asset($rti->img_src)}}" alt="{{$rti->img_alt}}">

                                            <p class="mt-5">
                                                <button type="button" onclick=" return confirm('Are you sure you want to delete this image?? ')" class="btn btn-danger btn-sm delete-image-btn" data-image-id="{{$rti->id}}"><i class="fa    fa-trash"></i>
                                                </button>
                                            </p>
                                        </td>
                                        @endforeach
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" value="Update" name="" id="" class="btn btn-primary">

                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

</div>
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('.delete-image-btn').click(function(){
            var _img_id = $(this).attr('delete-image-id');
            //the var below will give us access to 'delete-image-btn'
            var _vm = $(this);
            $.ajax({
                url: "{{url('admin/roomtypeimage/"+_img_id+"/delete')}}",
                dataType: 'json',
                beforeSend:function(){
                    _vm.addClass('disabled');
                },
                success:function(res){
                  console.log(res);
                  $.(".imgcol"+_img_id).remove();
                  _vm.removeClass('disabled');

                }
            });
        });
    });
</script>
@endsection

@endsection

