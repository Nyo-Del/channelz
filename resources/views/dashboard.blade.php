<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{asset('main.css')}}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <div class="mb-5">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{route('back')}}">
                <i class="fa-solid fa-film fw-bold text-danger"></i>
                <span class="fs-5 mx-2 fw-bold  fs-4">Admin Dashboard</span>
            </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Admin Dashboard</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 mt-2">

                    <li class="nav-item  mx-1 mb-2">
                        <form class="d-flex justify-content-center " role="search" action="{{ route('dashboard') }}" method="GET">
                            <input class="form-control me-2  border-0 w-75 " type="search" placeholder="Search Movie By Name" aria-label="Search" name="search">
                            <button class="btn btn-danger" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </li>
                    <hr>

                    <div class="">

                        <li class="nav-item  ">
                            <a class="nav-link mx-1 d-flex  " aria-current="page" href="{{route('pf')}}">
                              <img src="{{ Storage::url(Auth::user()->picture == null ?'pic/undraw_profile.svg' : 'pic/'.Auth::user()->picture) }}" alt="" class="img-profile rounded-circle  " width="45px">
                              <span class="mx-2 mt-2">
                             {{  Auth::user()->nickname == null ? Auth::user()->name : Auth::user()->nickname ;  }}
                              </span>
                            </a>
                        </li>

                          @if (Auth::user()->role != 'admin' )

                          <li class="nav-item">
                            <a class=" nav-link " aria-current="page" href="{{route('newadm')}}"><i class="fa-solid fa-user-plus mx-1"></i>   Add New Admin</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{route('V#ads')}}"><i class="fa-solid fa-file-circle-plus mx-1"></i>  Add Ads</a>
                          </li>
                          @endif


                      <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{route('upload')}}"> <i class="fa-solid fa-upload mx-1" ></i>  Upload Movies</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{route('C#create')}}"><i class="fa-solid fa-circle-plus mx-1"></i>  Create Categories</a>
                      </li>

                      @if (Auth::user()->role != 'admin')
                      <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{route('web')}}"><i class="fa-solid fa-chart-line mx-1"></i>  Website Activity</a>
                      </li>
                      @endif

                      <li class="nav-item">
                        <a class="nav-link" href="{{route('back')}}"><i class="fa-solid fa-house mx-1"></i>Back to Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('back')}}"><i class="fa-solid fa-cloud mx-1"></i>
                            <span class="align-content-center "> Created:<span class="mx-2">{{Auth::user()->created_at->format('j-F-Y')}}</span></span>
                        </a>
                      </li>


                      <li class="nav-item mt-4">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                                <button type="submit" class="btn bg-danger shadow-lg text-white mx-2"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                          </form>
                        </li>
                    </div>

                  </ul>

                </div>
              </div>
            </div>
          </nav>

    </div>
        @include('sweetalert::alert')
        @yield('admincontent')
        <!--Footer-->

  <!-- Footer -->
  <footer class="bg-dark text-light py-4 mt-5">
    <div class="container">
        <div class="row">
            <!-- Logo and Description -->
            <div class="col-md-4 mb-3">
                <h5 class="text-uppercase">JustFlix</h5>
                <p>Your one-stop platform for all things movies. Explore, watch, and enjoy!</p>
            </div>

            <!-- Useful Links -->
            <div class="col-md-4 mb-3">
                <h5 class="text-uppercase">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light text-decoration-none">Home</a></li>
                    <li><a href="#" class="text-light text-decoration-none">About Us</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Contact</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Terms of Service</a></li>
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
<script>
    function loadFile(event){
     var reader = new FileReader();

      reader.onload = function (){
             var output = document.getElementById("output");
             output.src = reader.result;

      }
         reader.readAsDataURL(event.target.files[0]);
    }
 </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
