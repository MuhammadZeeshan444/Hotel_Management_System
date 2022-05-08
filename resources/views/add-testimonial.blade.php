@extends('frontLayout')
@section('content')
<div class="container my-4">
    <h3 class="mb-3">Add Testimonial</h3>
    @if (Session::has('success'))
    <p class="text-success">{{session('success')}}</p>
    @endif
    <form action="{{url('customer/save-testimonial')}}" method="POST">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th>Testimonial<span class="text-danger">*</span></th>
                <td><textarea rows="8" class="form-control" name="testi_cont" id=""></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" class="btn btn-primary" ></td>
            </tr>
        </table>
    </form>
</div>
@endsection
