<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('Bootstrap5/bootstrap.min.css')}}" >
    <script type="text/javascript" src="{{asset('Bootstrap5/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset("vendor/jquery/jquery.min.js")}}"></script>

    <title>8PM Hotel</title>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">

                <a class="navbar-brand" href="{{url('/')}}">8PM Hotel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-sm-auto">
                        <a class="nav-link" aria-current="page" href="#">Services</a>
                        <a class="nav-link" href="#">Gallery</a>
                        <a class="nav-link" href="{{url('page/about-us')}}">About Us</a>
                        <a class="nav-link" href="{{url('page/contact-us')}}">Contact Us</a>


                        @if (Session::has('customerlogin'))
                        <a class="nav-link" href="{{url('customer/add-testimonial')}}">Add Testimonial</a>
                        <a class="nav-link" href="{{url('logout')}}">logout</a>
                        <a class="nav-link btn btn-danger btn-outline-success text-bold text-white" href="{{url('booking')}}">BOOKING</a>
                        @else
                            <a class="nav-link" href="{{url('login')}}">Login</a>
                            <a class="nav-link" href="{{url('register')}}">Register</a>
                            <a class="nav-link btn btn-danger btn-outline-success text-bold  text-white" href="#">BOOKING</a>
                        @endif


                    </div>
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
</body>
</html>
