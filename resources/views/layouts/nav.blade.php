    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-0">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{-- {{ config('app.name', 'Laravel') }} --}}
                <strong>Easy Check Up</strong> — Doctor Finder
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login or Signup') }}</a>
                            </li>
                        @endif

                        {{-- @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif --}}

                        
                        

                    @else {{-- IF AUTHORIZED --}}
                        @if(Auth::user()->role_id  == 2)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('dashboard-doctor') }}">Doctor Dashboard</a>
                                </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard-patient') }}">Patient Dashboard</a>
                            </li>
                        @endif
                        
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="text-capitalize">{{ Auth::user()->fname }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>

