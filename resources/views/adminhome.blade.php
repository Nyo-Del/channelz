@extends('dashboard')
@section('admincontent')

<div class="container-fluid">
    <div class="row mt-5">
      <div class="col-lg-3  col-md-12 col-sm-12 col-sm-mx-0  md-mx-0">
        <span class="fw-bold fs-5 ">Admin Control <i class="fa-solid fa-film fw-bold text-danger"></i> </span>
        <p class="mt-2 text-muted">Manage your platform effortlessly with powerful admin controls. Upload movies by adding titles, descriptions, thumbnails, and media files. Create and organize categories to keep your content structured. Edit and update movie details, replace outdated files, and ensure your library stays relevant. Delete movies or categories that are no longer needed, maintaining a clean and user-friendly platform.</p>
        <hr>
        <div class="">
          <span class="mt-3 fw-bold"> If you need webseit like this?</span>
          <p class="mt-2 text-muted">  We’ve got you covered! Stunning designs, seamless functionality, and a user-friendly experience — all tailored to your needs. Bring your vision to life and captivate your audience with a site that truly stands out. Let’s create something amazing together!</p>
          <p class="fw-bold my-2"> Contact Now!</p>
          <p class="">Phone : @Rick_C143</p>
          <p class="">Email : Email : hiccupthe4th@gmail.com</p>
          <div class="d-flex justify-content-evenly mt-3 text-danger fs-5">
            <i class="fa-solid fa-phone"></i>
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <i class="fa-brands fa-telegram"></i>
            <i class="fa-brands fa-viber"></i>
          </div>


          <hr>
        </div >
        <div class="d-none d-lg-inline d-md-inline d-sm-inline">
          <p class="h6 fw-bold">Let me Knowyour experience</p>
          <form action="{{route('adminrv',Auth::user()->id)}}" method="POST" class="mt-1" role="search">
            @csrf
            <input class="form-control me-2 @error('description')is-invalid @enderror" type="search" name="description" placeholder="Userexperience..." aria-label="Search">

              <button class="btn btn-danger mt-2 mx-2" type="submit">Submit</button>
          </form>


        </div>
      </div>
      <div class="col-lg-8 col-md-12 col-sm-12 col-12 mx-0 justify-content-evenly ">
        <!-- Mv S-->
          <div class="container-fluid mx-0 h-50">
            <div class="row mt-3 d-flex align-items-center ">
                @foreach ($movies as $item)
                <div class="col-lg-3   col-md-4 col-sm-6 col-6 md-mx-3 sm-mx-2 col-mx-0 ">
                    <div class="cus-cart  mt-3  shadow-lg" >
                        <img src="{{ Storage::url( 'mvpic/'.$item->Mpic )}}" class="card-img-top rounded-top mpic"  alt="...">
                        <div class="card-body bg-dark rounded-bottom">
                          <span class="card-text">
                            <div class="">
                                <p class="fs-rp fw-semibold fs-6 text-light mx-2 py-2 text-truncate" style="max-width: 100%; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                    {{$item->Mname}}
                                    <span class="d-none d-lg-inline d-md-inline d-sm-inline overflow-hidden">
                                        ({{$item->year}})
                                    </span>
                                </p>

                              <div class="row">
                                <div class="d-flex justify-content-evenly flex-lg-wrap mt-0 mb-3 pb-0 ">
                                      <div class="kmb">
                                         <a href="{{route('Mv#delete',$item->id)}}" class="btn btn-danger"> <i class="fa-solid fa-trash mx-2"></i>

                                            <span class="d-none d-lg-inline d-md-inline d-sm-inline">Delete
                                            </span>

                                         </a>
                                      </div>
                                      <div class="class">
                                        <a href="{{route('edit#mv',$item->id)}}" class="btn btn-primary text-white  btn-sm px-2 py-2">
                                            <span class="">Edit <span class="d-none d-lg-inline d-md-inline d-sm-inline">Details</span></span>
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
                <div class="d-flex justify-content-center mt-2 ">
                    {{ $movies->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
   <!-- Mv E-->





@endsection
