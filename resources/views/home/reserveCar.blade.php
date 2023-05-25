<!DOCTYPE html>
<html lang="en">
<head>
    <title>Carbook - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                <h1 class="mb-3 bread">Reserve Your Car</h1>
            </div>
        </div>
    </div>
</section>



<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <p class="mb-3 mt-3 h3">Please Fill out the form below</p>
        <form action="{{url('/submit_reservation', $car->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label>Full Names :</label>
                <input class="form-control" type="text" name="name" placeholder="Name" required>
            </div>

            <div class="form-group">
                <label>Email :</label>
                <input class="form-control" type="email" name="email" placeholder="Email" required>
            </div>

            <div class="form-group">
                <label>Phone :</label>
                <input class="form-control" type="text" name="phone" placeholder="Phone" required>
            </div>

            <div class="d-flex">
                <div class="form-group mr-2">
                    <label for="" class="label">Pick-up date</label>
                    <input type="text" class="form-control" name="pickUpDate" id="book_pick_date" placeholder="Date" required>
                </div>
                <div class="form-group ml-2">
                    <label for="" class="label">Drop-off date</label>
                    <input type="text" class="form-control" name="dropOffDate" id="book_off_date" placeholder="Date" required>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="label">Pick-up time</label>
                <input type="text" class="form-control" name="pickUpTime" id="time_pick" placeholder="Time" required>
            </div>

            <div class="form-group">
                <label>Chauffeur(Yes/No) :</label>
                <input class="form-control" type="text" name="chauffeur" placeholder="Yes/No" required>
            </div>

            <div class="form-group">
                <input type="submit" name="" value="Submit" class="btn btn-success text-dark">
            </div>
        </form>

    </div>
</section>


@include('home.footer')



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


@include('home.js')

</body>
</html>
