@extends('dashboard')

@section('admincontent')
<div class="bg-white">
         <!-- Begin Page Content -->
         <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>

            <!-- Content Row -->

    <div class="row ">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow  py-2">
                <div class="card-body">
                    <a href="{{route('adlist')}}" class="text-decoration-none text-dark ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Ads (Monthly)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($ad)}} Pcs</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total  Cash (Monthly)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{  $price  }} MMK</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Activity
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $vc/1000}}%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-danger" role="progressbar"
                                            style="width:{{ $vc/1000}}%" aria-valuenow="{{ $vc/1000}}" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <a href="{{route('adminlist')}}" class="text-decoration-none  ">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Admin List</div>
                            <div class="h5 mb-0 font-weight-bold  mx-2 text-dark">{{  count($admin)  }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-users-gear fa-2x  text-dark"></i>

                        </div>
                    </div>
                  </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow ">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 ">
                    <h6 class="m-0 font-weight-bold text-primary">User Contact</h6>
                    <hr>
                    @foreach ($userrv as $item)
                    <div class="container mt-1">
                        <div class="row">
                           <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <div class="">{{$item->description}}</div>
                            </div>
                            <div class="d-flex justify-content-end">
                            <a href="{{route('delete',$item->id)}}" class="mt-1 text-decoration-none text-danger ">Delete </a>
                            </div>
                             <hr>
                         </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="d-flex justify-content-center mt-2 " >
                        <span class="">{{ $userrv->links() }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5 mt-2">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Admin List</h6>
                    <div class="dropdown no-arrow">


                    </div>
                </div>
                <!-- Card Body -->
                @foreach ($adminrv as $item)
                <div class="container mt-2">
                    <div class="row">
                       <div class="col-12">
                        <div class="d-flex justify-content-between">
                            <a href="{{route('adminlist',$item->user_id)}}" class="text-decoration-none text-dark ">
                                <div class="mt-1 h6 ">{{$item->username}}</div>
                            </a>
                            <div class="">
                                <a href="{{route('admdelete',$item->id)}}" class="text-danger">Delete </a>
                            </div>
                        </div>
                        <p class="mt-2">{{$item->description}}</p>
                        <p></p>
                         <hr>
                     </div>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-center mt-2 " >
                    <span class="">{{ $adminrv->links() }}</span>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
