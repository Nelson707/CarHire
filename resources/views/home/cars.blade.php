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

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/car-5.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Choose Your Car</h1>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section bg-light">
    <div class="container">

        <div class="mb-5">
            <form action="{{url('search_car')}}" method="get">
                <input type="text" name="search" class="form-control" id="navbar-search-input" placeholder="Search Car" aria-label="search" aria-describedby="search">
            </form>
        </div>

        <div class="row">
            @foreach($car as $car)
            <div class="col-md-4">
                <div class="car-wrap rounded ftco-animate">
                    <img src="car_images/{{ $car->image }}" class="img rounded d-flex align-items-end">
                    <div class="text">
                        <h2 class="mb-0">{{ $car->name }}</h2>
                        <div class="d-flex mb-3">
                            <span class="cat text-dark">{{ $car->type }}</span>
                            <p class="price ml-auto">Ksh. {{ $car->daily }}<span class="text-dark">/day</span></p>
                        </div>
                        <p class="d-flex mb-0 d-block"><a href="{{url('/car_details', $car->id)}}" class="btn btn-secondary py-2 ml-1">View Details</a></p>
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