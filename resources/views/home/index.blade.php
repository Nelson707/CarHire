<!DOCTYPE html>
<html lang="en">
<head>
    <title>Carbook - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    @include('home.css')
</head>
<body>

@include('home.navbar')
<!-- END nav -->

<div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
            <div class="col-lg-8 ftco-animate">
                <div class="text w-100 text-center mb-md-5 pb-md-5">
                    <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
                    <p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts</p>
                    <a href="https://www.youtube.com/watch?v=0wNuz8kLBwc" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="ion-ios-play"></span>
                        </div>
                        <div class="heading-title ml-5">
                            <span>Easy steps for renting a car</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-12	featured-top">
                <div class="row no-gutters">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                            <button type="button" class="close" style="float: right;" data-dismiss="alert" aria-hidden="true">X</button>
                        </div>
                    @endif
                    <div class="col-md-4 d-flex align-items-center">
                        <form action="{{url('book_car')}}" class="request-form ftco-animate bg-primary" method="post">
                            @csrf
                            <h2>Make your trip</h2>
                            <div class="form-group">
                                <label for="" class="label">Pick-up location</label>
                                <input type="text" class="form-control" name="pickUpLocation" placeholder="City, Airport, Station, etc">
                            </div>

                            <div class="form-group">
                                <label for="" class="label">Drop-off location</label>
                                <input type="text" class="form-control" name="dropOffLocation" placeholder="City, Airport, Station, etc">
                            </div>

                            <div class="d-flex">
                                <div class="form-group mr-2">
                                    <label for="" class="label">Pick-up date</label>
                                    <input type="text" class="form-control" name="pickUpDate" id="book_pick_date" placeholder="Date">
                                </div>
                                <div class="form-group ml-2">
                                    <label for="" class="label">Drop-off date</label>
                                    <input type="text" class="form-control" name="dropOffDate" id="book_off_date" placeholder="Date">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="label">Pick-up time</label>
                                <input type="text" class="form-control" name="pickUpTime" id="time_pick" placeholder="Time">
                            </div>

                            <div class="form-group">
                                <label for="" class="label">Passengers</label>
                                <input type="number" class="form-control" name="passengers" id="" placeholder="Passengers">
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Book A Car Now" class="btn btn-secondary py-3 px-4">
                            </div>

                        </form>
                    </div>

                    <div class="col-md-8 d-flex align-items-center">
                        <div class="services-wrap rounded-right w-100">
                            <h3 class="heading-section mb-4">Better Way to Rent Your Perfect Cars</h3>
                            <div class="row d-flex mb-4">
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Choose Your Pickup Location</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Select the Best Deal</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Reserve Your Rental Car</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p><a href="{{url('/cars')}}" class="btn btn-primary py-3 px-4">Reserve Your Perfect Car</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>


<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">What we offer</span>
                <h2 class="mb-2">Feeatured Vehicles</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-car owl-carousel">
                    @foreach($car as $car)
                        @if($car->passengers == '4')
                            <div class="item">
                                <div class="car-wrap rounded ftco-animate">
                                    <img src="car_images/{{ $car->image }}" class="img rounded d-flex align-items-end">
                                </div>
                                <div class="text">
                                    <h2 class="mb-0 h5">{{ $car->name }}</h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat text-dark">{{ $car->type }}</span>
                                        <p class="price ml-auto text-primary">{{ $car->daily }} <span>/day</span></p>
                                    </div>
                                    <p class="d-flex mb-0 d-block"><a href="{{url('/car_details', $car->id)}}" class="btn btn-secondary py-2 ml-1">View Details</a></p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="ftco-section ftco-about">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);">
            </div>
            <div class="col-md-6 wrap-about ftco-animate">
                @foreach($about as $about)
                    <div class="heading-section heading-section-white pl-md-5">
                        <span class="subheading">About us</span>
                        <h2 class="mb-4">Welcome to Carbook</h2>

                        <p>{{ $about->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Services</span>
                <h2 class="mb-3">Our Services</h2>
            </div>
        </div>
        <div class="row">
            @foreach($service as $service)
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">{{ $service->name }}</h3>
                            <p>{{ Str::limit ($service->details , 150) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ftco-section ftco-intro" style="background-image: url(images/bg_3.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section heading-section-white ftco-animate">
                <h2 class="mb-3">Do You Want To Earn With Us? So Don't Be Late.</h2>
                <a href="{{url('contact')}}" class="btn btn-primary btn-lg">Become A Driver</a>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Blog</span>
                <h2>Recent Blog</h2>
            </div>
        </div>
        <div class="row d-flex">
            @foreach($post as $post)
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <img src="media/{{ $post->image }}" class="img rounded d-flex align-items-end" height="300" width="400">
                        <div class="text pt-4">
                            <div class="meta mb-3">
                                <div><a href="#">{{ $post->author }}</a></div>
                                <div><a href="#">{{ $post->created_at }}</a></div>
                            </div>
                            <h3 class="heading mt-2"><a href="{{url('blog_details', $post->id)}}">{{$post->title}}</a></h3>
                            <p><a href="{{url('blog_details', $post->id)}}" class="btn btn-primary">Read more</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


@include('home.footer')



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


@include('home.js')

</body>
</html>
