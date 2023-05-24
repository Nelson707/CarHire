<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('admin.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
            </div>
        </div>

        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                        <button type="button" class="close" style="float: right;" data-dismiss="alert" aria-hidden="true">X</button>
                    </div>
                @endif



                <h1 class="h3">Add Product</h1>

                <form action="{{ url('/update_car', $car->id) }}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="div_design">
                        <label>Car Name :</label>
                        <input class="form-control" type="text" name="car_name" placeholder="Car Name" value="{{ $car->name }}" required>
                    </div>

                    <div class="div_design">
                        <label>Car Details :</label>
                        <textarea class="form-control" name="car_details" cols="20" rows="5">{{ $car->details }}</textarea>
                    </div>

                    <div class="div_design">
                        <label>Car Passengers :</label>
                        <input class="form-control" type="number" name="passenger_count" value="{{ $car->passengers }}" placeholder="Passengers"  required>
                    </div>

                    <div class="div_design">
                        <label>Per Hour Rate :</label>
                        <input class="form-control" type="number" name="hour_rate" value="{{ $car->hourly }}" placeholder="Per hour rate">
                    </div>

                    <div class="div_design">
                        <label>Per Day Rate :</label>
                        <input class="form-control" type="number" name="daily_rate" value="{{ $car->daily }}" placeholder="Per day rate" required>
                    </div>

                    <div class="div_design">
                        <label>Leasing :</label>
                        <input class="form-control" type="number" name="lease_rate" value="{{ $car->leasing }}" placeholder="Leasing" required>
                    </div>

                    <div class="div_design">
                        <label>Car Type :</label>
                        <select class="form-control" name="car_type" required>
                            <option value="{{ $car->type }}" selected="">{{ $car->type }}</option>

                            @foreach($carType as $carType)
                                <option value="{{ $carType->getAttributeValue('name') }}">{{ $carType->getAttributeValue('name') }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="div-design">
                        <label>Current Product Image :</label>
                        <img  height="100" width="100"
                              src="/car_images/{{ $car->image }}" alt="">
                    </div>


                    <div class="div_design">
                        <label>New Car Image Here :</label>
                        <input type="file" name="image" required style="margin-top: 5px">
                    </div>

                    <div class="div_design">
                        <input type="submit" name="" value="Add Car" class="btn btn-primary text-black">
                    </div>

                </form>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('admin.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

@include('admin.js')
</body>

</html>


