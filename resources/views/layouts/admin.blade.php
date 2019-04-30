<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ config('app.name', 'OKDFS') }}</title>
  <link rel="stylesheet" href="{{ asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/iconfonts/font-awesome/css/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.addons.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
  <div class="container-scroller" id="app">
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="/">
          <h3 class="mt-2 text-light">{{ config('app.name', 'OKDFS') }}</h3>
        </a>
        <a class="navbar-brand brand-logo-mini" href="/">
          <h4 class="mt-2 text-light">{{ config('app.name', 'OKDFS') }}</h4>
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
        </ul>
        <ul class="navbar-nav navbar-nav-right">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
          @else
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">{{ Auth::user()->first_name . ' ' . Auth::user()->middle_name }}</span>
              <img class="img-xs rounded-circle" src="{{ asset('images/user-placeholder.jpg') }}" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <a class="dropdown-item mt-2">
                Profile
              </a>
              <a class="dropdown-item">
                Change Password
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
          </li>
          @endguest
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid top-padding page-body-wrapper">
    @guest
        @yield('content')
    @else
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="{{ asset('images/user-placeholder.jpg') }}" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{ Auth::user()->first_name . ' ' . Auth::user()->middle_name }}</p>
                  <div>
                    <small class="designation text-muted">{{ Auth::user()->role }}</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/app/home">
              <i class="menu-icon fa fa-dashboard"></i>
              <span class="menu-title">Home</span>
            </a>
          </li>
          @if (Auth::user()->role === 'admin')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('hospitals') }}">
              <i class="menu-icon fa fa-ambulance"></i>
              <span class="menu-title">Hospitals</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('doctors') }}">
              <i class="menu-icon fa fa-user-md"></i>
              <span class="menu-title">Doctors</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('resources') }}">
              <i class="menu-icon fa fa-book"></i>
              <span class="menu-title">Resources</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="{{ route('chat', 2) }}">
              <i class="menu-icon fa fa-book"></i>
              <span class="menu-title">Chat</span>
            </a>
          </li> -->
          @endif
          @if(Auth::user()->role === 'doctor')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('hospitalParients') }}">
              <i class="menu-icon fa fa-group"></i>
              <span class="menu-title">Patients</span>
            </a>
          </li>
          @endif
          @if(Auth::user()->role === 'user')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('usersDoctor') }}">
              <i class="menu-icon fa fa-user-md"></i>
              <span class="menu-title">Doctors</span>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{ route('messages') }}">
              <i class="menu-icon fa fa-wechat"></i>
              <span class="menu-title">Messages</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
            @yield('content')
        </div>
      </div>
      @endguest
    </div>
  </div>

  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('vendors/js/vendor.bundle.addons.js') }}"></script>
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/misc.js') }}"></script>
  <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>