<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{url('/redirect')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{url('/car_types')}}">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Car Types</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Cars</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{url('/add_car')}}">Add Car</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/all_cars')}}">All Cars</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{url('/all_bookings')}}">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Bookings</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{url('/reservation_orders')}}">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Reservation Orders</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <i class="icon-contract menu-icon"></i>
                <span class="menu-title">Posts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('add_post')}}">Add Post</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('all_posts')}}">All Posts</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">About Us</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('about_us')}}">Add About Us</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('view_about_us')}}">View About Us</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
                <i class="icon-server menu-icon"></i>
                <span class="menu-title">Services</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('add_service')}}">Add Service</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('view_services')}}">View Services</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{url('/received_messages')}}">
                <i class="icon-mail menu-icon"></i>
                <span class="menu-title">Inbox</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>