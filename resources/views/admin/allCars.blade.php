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

                <h1 class="mx-auto h3" style="width: 200px; font-size: 20px">All Cars</h1>

                <div class="table-responsive">
                    <table class="table">
                        <tr class="bg-info">
                            <th class="text-dark">#</th>
                            <th class="text-dark">Name</th>
                            <th class="text-dark">Details</th>
                            <th class="text-dark">Passengers</th>
                            <th class="text-dark">Hourly</th>
                            <th class="text-dark">Daily</th>
                            <th class="text-dark">Leasing</th>
                            <th class="text-dark">Car Type</th>
                            <th class="text-dark">Image</th>
                            <th class="text-dark">Actions</th>
                        </tr>

                        @forelse($car as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td>{{ $car->name }}</td>
                                <td>{{ $car->details }}</td>
                                <td>{{ $car->passengers }}</td>
                                <td>{{ $car->hourly }}</td>
                                <td>{{ $car->daily }}</td>
                                <td>{{ $car->leasing }}</td>
                                <td>{{ $car->type }}</td>
                                <td>
                                    <img src="/car_images/{{ $car->image }}">
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ url('edit_car', $car->id) }}">Edit</a>
                                    <a onclick="return confirm('Are you sure you want to delete this Car?')"  class="btn btn-danger" href="{{ url('delete_car', $car->id) }}">Delete</a>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="16">
                                    No Records Found.
                                </td>
                            </tr>

                        @endforelse

                    </table>
                </div>
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


