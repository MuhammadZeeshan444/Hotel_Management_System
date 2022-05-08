@extends('frontLayout')
@section('content')

        <!-- Slider Section Start -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($banners as $index => $banner)
                <div  class="carousel-item  @if($index==0) active @endif">
                    <img style="height: 300px" src="{{asset('img/'.$banner->banner_src)}}" class="d-block w-100" alt="{{$banner->alt_text}}">
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Slider Section End -->

        <!-- Service Section Start -->
          <div class="container">
              <h1 class="text-center my-4 border-bottom">Services</h1>
              @foreach($services as $service)
              <div class="row my-4">
                  <div class="col-md-4">
                      <div class="img-thumbnail">
                        <a href="{{url('service/'.$service->id)}}"></a><img  height="250px" style="width: 100%" src="{{asset('img/'.$service->photo)}}" alt="photo"></a>
                      </div>
                  </div>
                  <div class="col-md-8">
                      <h3>{{$service->title}}</h3>
                      <p>{{$service->small_desc}}<p>
                          <a href="{{url('service/'.$service->id)}}" class="btn btn-primary">Read More</a>
                      </p>
                  </div>
              </div>
              @endforeach
          </div>
        <!-- Service Section End -->

        <!-- Gallery Section Start -->
          <div class="container my-4">
            <h1 class="text-center my-4 border-bottom">Gallery</h1>
              <div class="row my-4">
                  @foreach ($roomTypes as $rtype)
                    <div class="col-md-3">
                        <div class="card">
                          <div class="card-body">
                              <h5 class="card-header">{{$rtype->title}}</h5>
                                @foreach ($rtype->roomtypeimage as $index => $rti)
                                      <td>
                                        <a href="{{asset($rti->img_src)}}" data-lightbox="rgallery{{$rtype->id}}">
                                        @if ($index > 0)
                                          <img class="img-fluid hide" src="{{asset($rti->img_src)}}" alt="{{$rti->img_alt}}">

                                        @else
                                            <img class="img-fluid" src="{{asset($rti->img_src)}}" alt="{{$rti->img_alt}}">

                                        @endif
                                      </a>
                                    </td>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
              </div>
          </div>

        <!-- Gallery Section End -->

         <!-- Slider Section Start -->
         <h1 class="text-center my-4 mt-4">Testimonials</h1>
        <div id="testimonials" class="carousel slide p-5 mb-4 bg-secondary text-white border"          data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($testimonials as $index=>$testi)
                        <div class="carousel-item @if($index==0) active @endif">
                            <figure class="text-center">
                                <blockquote  class="blackquote">
                                    <p>{{$testi->testi_cont}}</p>
                                </blockquote>
                                <figcaption class="blackquote-footer text-white">
                                    {{$testi->customer->full_name}}
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach
                </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonials" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonials" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Slider Section End -->

<link rel="stylesheet" href="{{asset('vendor/lightbox2-2.11.3/dist/css/lightbox.min.css')}}">

<script type="text/javascript" src="{{asset('vendor/lightbox2-2.11.3/dist/js/lightbox.min.js')}}"></script>

<style>
  .hide{
    display: none;
  }
</style>
@endsection
</body>
</html>
