
    @if (Route::has('login'))

            <nav class="navbar navbar-expand-sm bg-light">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">e-Survey Shangri-La</a>
                    </div>
                <ul class="nav navbar-nav">
                    @auth
                        @if (Auth::user()->isOfficer())
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="/officer/dashboard">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="/resident/dashboard">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
                        @endif




                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                </ul>
                </div>
            </nav>
        </div>
    @endif


