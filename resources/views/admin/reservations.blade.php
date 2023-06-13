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
                <div class="table-responsive">
                    <h3 class="text-center h3">All orders</h3>
                    <table class="table">
                        <tr class="bg-info">
                            <th class="text-dark">Name</th>
                            <th class="text-dark">Email</th>
                            <th class="text-dark">Phone</th>
                            <th class="text-dark">User id</th>
                            <th class="text-dark">Car id</th>
                            <th class="text-dark">Car Name</th>
                            <th class="text-dark">Daily price</th>
                            <th class="text-dark">Pick up date</th>
                            <th class="text-dark">Drop off date</th>
                            <th class="text-dark">Pick up time</th>
                            <th class="text-dark">Chauffeur</th>
                            <th class="text-dark">Payment Status</th>
                            <th class="text-dark">Delivery Status</th>
                            <th class="text-dark">Confirmation</th>
                            <th class="text-dark">Print PDF</th>
                            <th class="text-dark">Send Email</th>
                        </tr>

                        @forelse($order as $order)
                            <tr>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->user_id }}</td>
                                <td>{{ $order->car_id }}</td>
                                <td>{{ $order->car_name }}</td>
                                <td>{{ $order->daily_price }}</td>
                                <td>{{ $order->pick_up_date }}</td>
                                <td>{{ $order->drop_off_date }}</td>
                                <td>{{ $order->pick_up_time }}</td>
                                <td>{{ $order->chauffeur }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>{{ $order->delivery_status }}</td>

                                <td>
                                    @if($order->delivery_status == "Processing...")
                                    <a href="{{url('order_confirmation', $order->id)}}" onclick="return confirm('Are you sure you want to confirm the Delivery?')" class="btn btn-primary">Confirm</a>
                                    @else
                                    <p style="color: royalblue">Confirmed</p>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{url('print_pdf', $order->id)}}" class="btn btn-info">Print PDF</a>
                                </td>

                                <td>
                                    <a href="{{url('send_email', $order->id)}}" class="btn btn-success">Send Email</a>
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


