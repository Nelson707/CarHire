<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">Car<span>Book</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{url('/about')}}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{url('/services')}}" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="{{url('/cars')}}" class="nav-link">Cars</a></li>
                <li class="nav-item"><a href="{{url('/blog')}}" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="{{url('/contact')}}" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="{{url('/show_bookings')}}" class="nav-link">Bookings</a></li>
                <li class="nav-item"><a href="{{url('/show_reservations')}}" class="nav-link">Reservations</a></li>
            </ul>
            @if (Route::has('login'))
                <ul class="navbar-nav ml-auto">
                    @auth()
                        @if(Auth::user()->role == '1')
                            <li class="nav-item"><a href="{{ url('/redirect') }}" class="nav-link">Dashboard</a></li>
                            <x-app-layout>

                            </x-app-layout>
                        @else
                        <x-app-layout>

                        </x-app-layout>
                        @endif
                    @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                    @endauth
                </ul>
            @endif
        </div>
    </div>
</nav>