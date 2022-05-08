@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Booking
                <a href="{{url('admin/booking/create')}}" class="float-right btn-success btn-sm">View All</a>
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
                <form action="{{url('admin/booking')}}" method="POST">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Select Customers <span class="text-danger">*</span></th>
                            <td>
                                <select  class="form-control" name="customer_id">
                                    <option>--- Select Customers ---</option>
                                    @foreach ($data as $d)
                                        <option value="{{$d->id}}">{{$d->full_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>CheckIn Date <span class="text-danger">*</span></th>
                            <td><input type="date" name="checkin_date" class="form-control checkin-date" ></td>
                        </tr>
                        <tr>
                            <th>CheckOut Date <span class="text-danger">*</span></th>
                            <td><input type="date" name="checkout_date" class="form-control" ></td>
                        </tr>
                        <tr>
                            <th>Available Rooms <span class="text-danger">*</span></th>
                            <td>
                                <select  class="form-control room-list" name="room_id">

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Total Adults <span class="text-danger">*</span></th>
                            <td><input type="text" class="form-control" name="total_adults"></td>
                        </tr>
                        <tr>
                            <th>Total Children</th>
                            <td><input type="text" class="form-control" name="total_children"></td>
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

@section('scripts')
<script>
    $(document).ready(function(){
        $(".checkin-date").on('blur',function(){
             var _checkindate = $(this).val();
             //Ajax
             $.ajax({
                 url: "{{url('admin/booking/available-rooms')}}/"+_checkindate,
                 type:'GET',
                 dataType:'json',
                 beforeSend: function(){
                    $(".room-list").html('<option>--- Loading ---</option>');
                 },
                 success:function(res)
                 {
                    var _html = '';
                    $.each(res.data, function(index, row){
                        _html += '<option value ="'+row.id+'">'+row.title+'</option>';
                    });
                        $(".room-list").html(_html);
                 }
             });
        });
    });
</script>
@endsection

@endsection

