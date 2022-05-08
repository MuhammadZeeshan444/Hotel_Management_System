@extends('frontLayout')
@section('content')
<div class="container my-4">
    <h3 class="text-black mb-4">Room Booking</h3>
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
                    <tr >
                        <td colspan="2">
                            <input type="hidden" name="customer_id" value="{{session('data')[0]->id}}">
                            <input type="hidden" name="ref" value="front">
                            <input type="Submit" class="btn btn-primary" name="value">
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </div>
</div>

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
                        _html += '<option value ="'+row.room.id+'">'+row.room.title+'-'+row.roomtype.title+'</option>';
                    });
                        $(".room-list").html(_html);
                 }
             });
        });
    });
</script>

@endsection
