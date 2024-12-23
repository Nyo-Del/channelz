@extends('master')
 @section('master')

   @foreach ($details as $detail)
        <div class="container mt-4 mb-5 d-flex align-content-center">
            <div class="row mt-5">
                <div class="col-lg-4 offset-lg-1 mt-lg-5  col-md-6 offset-md-3 col-sm-8 offset-sm-2 " >
                    <div class=" shadow-lg  rounded mx-5 ">
                        <div class="rounded">
                            <img src="{{Storage::url('/mvpic/'.$detail->Mpic)}}" class="card-img-top mt-4 px-2 mb-4  w-100  " alt="...">
                        </div>

                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1  col-md-8 offset-md-2 col-sm-8 offset-sm-2 text-center mt-2">
                    <h4>{{$detail->Mname}} ({{$detail->year}}) </h4>
                    <span class="text-muted "><i class="fa-regular fa-eye mx-1"></i>{{ $detail->view_count }} view</span>
                    <div class="mt-2">
                        <div class="conatiner">
                            <div class="row">
                                <div class="col-6"> {{$detail->Mos}}</div>
                                <div class="col-6"> {{$detail->category_name}}</div>
                            </div>
                        </div>
                        <p class="">
                            <p>Description:</p>
                            {{$detail->description}}
                        </p>
                    <div class="mt-2 d-flex justify-content-evenly ">
                        <a href="{{$detail->Mlink}}}" class="btn btn-danger text-white "><i class="fa-solid fa-video mx-2"></i>Watch Now</a>
                        <a href="{{route('userhome')}}" class="btn btn-dark text-white  ">Back To Menu</a>
                    </div>
                    </div>
                    <div class="mt-4">
                    <div class="conatiner">
                        <div class="row">
                            <div class="col-6">Uploader :  <b>{{ ($detail->usernick == null) ? $detail->username : $detail->usernick ;  }}</b>  </div>
                            <div class="col-6">{{$detail->created_at->format('j-F-y')}}</div>
                        </div>
                    </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="container-fluid d-flex  justify-content-center  ">
            <div class="row ">

            @foreach ($related as $item)


                  @if ($related->count() == 4)
                  <div class="col-lg-3   col-md-4 col-sm-6 col-6 md-mx-3 sm-mx-2 col-mx-0 mt-2 ">
                   @endif
                   @if ($related->count() == 3)
                   <div class="col-lg-4   col-md-6 col-sm-6 col-6 md-mx-3 sm-mx-2 col-mx-0 mt-2 ">
                    @endif
                   @if ($related->count() == 2)
                   <div class="col-lg-6  col-md-6 col-sm-6 col-6 md-mx-3 sm-mx-2 col-mx-0 mt-2 ">
                    @endif

                   <div class="cus-cart  mt-3  shadow-lg" >
                       <div class="image-container">
                        <img src="{{ Storage::url( 'mvpic/'.$item->Mpic )}}" class="card-img-top rounded-top mpic"  alt="...">
                       </div>
                       <div class="card-body bg-dark rounded-bottom">
                       <span class="card-text">
                           <div class="">
                               <p class="fs-rp fw-semibold  fs-6   text-light mx-2 py-2 text-truncate" style="max-width: 100%; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{$item->Mname}}
                                   <span class="d-none d-lg-inline d-md-inline d-sm-inline">
                                    ({{$item->year}})
                                   </span>
                               </p>
                           <div class="row">
                               <div class="d-flex justify-content-evenly flex-lg-wrap mt-0 mb-3 pb-0 ">
                                   <div class="kmb">
                                       <a href="{{$item->Mlink}}" class="btn btn-danger"> <i class="fa-solid fa-video mx-2"></i><span class="d-none d-lg-inline d-md-inline d-sm-inline">Watch</span></a>
                                   </div>
                                   <div class="class">
                                       <a href="{{route('details',$item->id)}}" class="btn btn-primary text-white  btn-sm px-2 py-2">
                                       <span class="">More <span class="d-none d-lg-inline d-md-inline d-sm-inline">Details</span></span>
                                       </a>
                                   </div>
                               </div>
                           </div>
                           </div>
                       </span>
                       </div>
                   </div>
               </div>

             @endforeach


            </div>
        </div>
        <div class="d-flex justify-content-center mt-2 " >
            <span class="">{{ $related->links() }}</span>
        </div>
    @endforeach
 @endsection
