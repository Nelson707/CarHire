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
                <h1 class="mb-3 bread">Your Reservations</h1>
            </div>
        </div>
    </div>
</section>



<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <h3 class="h3">Your Order Details</h3>
        @foreach($order as $order)
            @if($order->user_id == Auth::user()->id)
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Car Name</th>
                        <th>Daily</th>
                        <th>Pick Up Date</th>
                        <th>Drop off Date</th>
                        <th>Pick Up Time</th>
                        <th>Chauffeur</th>
                        <th>Actions</th>
                    </tr>
                    <tr>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->car_name }}</td>
                        <td>{{ $order->daily_price }}</td>
                        <td>{{ $order->pick_up_date }}</td>
                        <td>{{ $order->drop_off_date }}</td>
                        <td>{{ $order->pick_up_time }}</td>
                        <td>{{ $order->chauffeur }}</td>
                        <td>
                            <a href="{{url('/cancel_order', $order->id)}}" class="btn btn-warning">Cancel</a>
                        </td>
                    </tr>
                </table>
            @endif
        @endforeach

    </div>
</section>


@include('home.footer')



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


@include('home.js')

</body>
</html>
