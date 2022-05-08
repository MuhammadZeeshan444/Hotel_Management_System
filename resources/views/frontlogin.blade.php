@extends('frontLayout')
@section('content')
<div class="container my-4">
    <h3 class="text-black mb-4">Login</h3>
    @if (Session::has('error'))
    <p class="text-danger">{{session('error')}}</p>
    @endif
    <form action="{{url('customer/login')}}" method="POST">
        @csrf
        <table class="table table-bordered">
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
                <td>
                    <input type="submit" class="btn btn-primary" >
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection
