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
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a href="{{url('/')}}">CarBook</a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
            <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                        <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
                        </div>
                        <form action="{{url('search_bookings')}}" method="get">
                            <input type="text" name="search" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                        </form>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item">
                    <x-app-layout>

                    </x-app-layout>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>
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
                            <th class="text-dark">pick_up_location</th>
                            <th class="text-dark">drop_off_location</th>
                            <th class="text-dark">pick_up_date</th>
                            <th class="text-dark">drop_off_date</th>
                            <th class="text-dark">pick_up_time</th>
                            <th class="text-dark">passengers</th>
                            <th class="text-dark">Print PDF</th>
                            <th class="text-dark">Send Email</th>
                        </tr>

                        @forelse($book as $book)
                            <tr>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->email }}</td>
                                <td>{{ $book->phone }}</td>
                                <td>{{ $book->pick_up_location }}</td>
                                <td>{{ $book->drop_off_location }}</td>
                                <td>{{ $book->pick_up_date }}</td>
                                <td>{{ $book->drop_off_date }}</td>
                                <td>{{ $book->pick_up_time }}</td>
                                <td>{{ $book->passengers }}</td>

                                <td>
                                    <a href="{{url('print_booking_pdf', $book->id)}}" class="btn btn-info">Print PDF</a>
                                </td>

                                <td>
                                    <a href="{{url('send_book_email', $book->id)}}" class="btn btn-success">Send Email</a>
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


