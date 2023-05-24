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

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">View Your Car</h1>
            </div>
        </div>
    </div>
</section>



<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <h1 class="h1">{{ $car->name }}</h1>
        <img src="/car_images/{{ $car->image }}" class="img rounded d-flex align-items-end">
        <div>
            <h1 class="h4">Car Type</h1>
            <p>{{ $car->type }}</p>
        </div>
        <div class="pb-3">
            <h1 class="h2">Overview</h1>
            <p>{{ $car->details }}</p>
        </div>
        <a href="{{url('/reserve_car',$car->id)}}" class="btn btn-success">Book Now</a>
    </div>
</section>


@include('home.footer')



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


@include('home.js')

</body>
</html>
