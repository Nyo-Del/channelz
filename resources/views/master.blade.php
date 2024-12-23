<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Channel Z</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        <link href="{{asset('main.css')}}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
         <!-- Nav Bar S-->
   <nav class="navbar navbar-dark bg-dark container-fluid">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <i class="fa-solid fa-film fw-bold text-danger"></i>
        <span class="fs-5 mx-2 fw-bold  fs-4">Channel Z</span>
    </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Search More..</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form class="d-flex mt-1" role="search" action="{{ route('userhome') }}" method="GET">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" >
                <button class="btn btn-danger" type="submit">Search</button>
            </form>


          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 mt-3">

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="{{route('userhome')}}">Latest Movies</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{route('userhome',0)}}">Most View Movies</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                    @foreach ($categories as $item)
                    <li><a class="dropdown-item" href="{{route('userhome',$item->id)}}">{{$item->Cname}}</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    @endforeach
              </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Channel Z Admins
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li>
                    <hr class="dropdown-divider">
                  </li>

                      @foreach ($admins as $item)
                      <li class="mx-2">
                        <img src="{{ $item->picture ? Storage::url('pic/' . $item->picture) : Storage::url('pic/undraw_profile.svg') }}" alt="" width="30" class="img-profile rounded-5 ">
                        <small class="mx-1">{{  ($item->nickname) ? $item->nickname : $item->name ; }}</small>
                     </li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      @endforeach
                </ul>
              </li>
            <li class="nav-item"></li>
              <a class="nav-link" href="{{ route('login') }}">Admin Control</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
          </ul>

        </div>
      </div>
    </div>
  </nav>

        @if ($ads)
            <div id="carouselExampleRide" class="carousel slide mt-1 " data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($ads as $key => $item)
                    <a href="{{ $item->adlink }}">
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <div class="d-flex justify-content-center">
                                <img src="{{ Storage::url('adpic/'.$item->adpic) }}" class="carousel-image" alt="Ad Image" >
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

            </div>
        @endif


        @include('sweetalert::alert')
    @yield('master')



    @if ($ads)
    <div id="carouselExampleRide" class="carousel slide mt-1 " data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($ads as $key => $item)
                <a href="{{ $item->adlink }}">
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                        <div class="d-flex justify-content-center">
                            <img src="{{ Storage::url('adpic/'.$item->adpic) }}" class="carousel-image" alt="Ad Image" >
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
@endif

<footer class="bg-dark text-light py-4 mt-5">
    <div class="container">
        <div class="row">
            <!-- Logo and Description -->
            <div class="col-md-4 mb-3">
                <h5 class="text-uppercase">Channel Z</h5>
                <p>Your one-stop platform for all things movies. Explore, watch, and enjoy!</p>
            </div>

            <!-- Useful Links -->
            <div class="col-md-4 mb-3">
                <h5 class="text-uppercase">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" target="home" class="text-light text-decoration-none">Home</a></li>
                    <li><a href="#" class="text-light text-decoration-none">About Us</a></li>

                </ul>
            </div>

            <!-- Social Media Icons -->
            <div class="col-md-4 mb-3">
                <h5 class="text-uppercase">Follow Us</h5>
                <div>
                    <a href="#" class=""><i class="fa-brands fa-facebook text-light mx-1"></i></a>
                    <a href="#" class=""><i class="fa-brands fa-viber text-light mx-2"></i></a>
                    <a href="#" class=""><i class="fa-brands fa-telegram text-light mx-2"></i></a>
                    <a href="#" class=""><i class="fa-brands fa-facebook-messenger text-light mx-2"></i></a>
                </div>
            </div>
        </div>
        <div class="text-center mt-1">
            <small>&copy; 2044 JustFlix. All rights reserved. Created with Bootstrap-5.</small>
        </div>
    </div>
</footer>




      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
