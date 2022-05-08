@extends('frontLayout')
@section('content')
<div class="container my-4">
    <h3 class="text-black mb-4">Registration Form</h3>
    @if (Session::has('success'))
    <p class="text-success">{{session('success')}}</p>
    @endif
    <form action="{{url('admin/customer')}}" method="POST">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th>Full Name<span class="text-danger">*</span></th>
                <td>
                    <input required type="text" class="form-control" name="full_name" id="">
                </td>
            </tr>
            <tr>
                <th>Email<span class="text-danger">*</span></th>
                <td>
                    <input required type="email" class="form-control" name="email" id="">
                </td>
            </tr>
            <tr>
                <th>Password<span class="text-danger">*</span></th>
                <td>
                    <input required type="password" class="form-control" name="password" id="">
                </td>
            </tr>
            <tr>
                <th>Mobile<span class="text-danger">*</span></th>
                <td>
                    <input required type="number" class="form-control" name="mobile" id="">
                </td>
            </tr>
            <tr>
                <th>Address</th>
                <td>
                    <input type="text" class="form-control" name="address" id="">
                </td>
            </tr>
            <tr>

                <td>
                    <input type="hidden" name="ref" value="front">
                    {{-- hiiden field to redirect back to this page --}}
                    <input type="submit" class="btn btn-primary" >
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection
