@extends('frontLayout')
@section('content')
<div class="container my-4">
    <h3 class="mb-3">Contact Us</h3>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="text-danger">{{$error}}</p>
    @endforeach
    @endif
    @if (Session::has('success'))
    <p class="text-success">{{session('success')}}</p>
    @endif
    <form action="{{url('page/save-contactus')}}" method="POST">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th>Full Name<span class="text-danger">*</span></th>
                <td><input type="text" class="form-control" name="full_name" id=""></td>
            </tr>
            <tr>
                <th>Email<span class="text-danger">*</span></th>
                <td><input type="email" class="form-control" name="email" id=""></td>
            </tr>
            <tr>
                <th>Subject<span class="text-danger">*</span></th>
                <td><input type="text" class="form-control" name="subject" id=""></td>
            </tr>
            <tr>
                <th>Message<span class="text-danger">*</span></th>
                <td><textarea rows="8" class="form-control" name="msg" id=""></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" class="btn btn-primary" ></td>
            </tr>
        </table>
    </form>
</div>
@endsection
