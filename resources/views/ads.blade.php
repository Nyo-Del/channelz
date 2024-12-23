@extends('dashboard')

@section('admincontent')

<div class="container rounded px-3 shadow-lg mt-3">

    <div class="row bg-white">
        <div class="col-lg-12 bg-dark rounded text-white mb-3 ">
            <div class="d-sm-flex align-items-center justify-content-between">
                <p class="mt-2  " > <i class="fa-solid fa-bars"></i> Adding Ads</p>
            </div>
        </div>
      <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4 col-md-6  col-sm-12 border shadow-lg rounded mb-3 bg-white">
                <form action="{{route('adcreate')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="">
                    <div class="">
                        <img src="{{Storage::url('pic/noimage.jpg' )}}" alt="" class="w-75 h-50  rounded mx-5 mt-4 " id="output" >
                    </div>
                    @error('adpic')
                    <span class="d-flex justify-content-center">
                    <small class="text-danger"> {{ $message }} </small>
                    </span>
                    @enderror
                    <div class="d-flex justify-content-center">
                        <input type="file" class=" form-group mt-1 bg-dark text-white mb-3  " name="adpic" onchange="loadFile(event)">
                    </div>
                </div>

            </div>
            <div class="col-lg-5 offset-lg-1 mt-5  col-md-6 col-sm-12">
                   <div class=" mb-2">
                    <div class="h6">
                        About Adding Ads,
                    </div>
                    <div class="">
                        Creating ads is a powerful way to promote content and engage users. Design custom ads with tailored placements, visuals, and messaging to fit your target audience. Use ads to highlight movies, services, or special offers, driving traffic and increasing visibility effectively.
                    </div>
                   <div class="conatiner">
                    <div class="row">
                        <div class="col-12">
                            <div class=" mt-2 mb-2">
                                <span class="">Ads Link: </span>
                                <span><input type="text" class=" form-control " name="adlink"></span>
                             </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-2 mb-2">
                                <span class="">Ads Name :</span>
                                <span><input type="text" class=" form-control @error('adname') is-invalid @enderror" name="adname" value="{{old('adname')}}"></span>
                             </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-2 mb-2">
                                <span class="">Ads Price :</span>
                                <span><input type="text" class=" form-control @error('ads_price') is-invalid @enderror" name="ads_price" value="{{old('ads_price')}}"></span>
                             </div>
                        </div>
                        </div>
                    </div>
                   </div>
                        <button class="btn sm btn-danger mx-1 mb-4" type="submit">Creat New Product</button>
                    </form>
                     <a href="{{route('adlist')}}" class="">
                        <button class="btn sm btn-dark mx-1 mb-4">View Ads</button>
                       </a>

            </div>
        </div>
      </div>

    </div>

</div>



@endsection
