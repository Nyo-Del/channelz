@extends('dashboard')

@section('admincontent')
<div class="container rounded px-3 shadow-lg ">
    <div class="row">
        <div class="col-lg-12 bg-dark rounded text-white mt-3 d-flex ">
            <div class="d-sm-flex align-items-center justify-content-between">
                <p class="mt-3 mx-2 " ><i class="fa-solid fa-bars mx-2"></i>Edit Account Information</p>
            </div>

        </div>
        <div class="col-lg-4 offset-lg-1 col-sm-8 offset-sm-2  rounded  mt-2 mb-2 rounded border">
            <div class="mt-4 mb-4">
                <p class="px-5 text-center bg-dark text-light rounded ">Account User Picture</p>
                <div class="d-flex justify-content-center">
                    <img src="{{ Storage::url(Auth::user()->picture == null ?'pic/undraw_profile.svg' : 'pic/'.Auth::user()->picture) }}" alt="" class="img w-50 rounded-5 img-profile" id="output">
                </div>
                <form action="{{ route('edit',Auth::user()->id) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                @error('image')
                <small class="text-danger mx-5 "> {{ $message }} </small>
                @enderror
                <div class="d-flex justify-content-center">
                    <input type="file" class=" form-group mt-4 bg-dark rounded text-white mb-3  " name="image" onchange="loadFile(event)">
                </div>
               </div>
        </div>
        <div class="col-lg-4 offset-lg-1 col-sm-8 offset-sm-2 mb-3 mt-3 ">

               <div class=" px-4  ">
                <div class="mt-3 mb-2 d-flex">
                    <span class="align-content-center text-dark"> Name:</span>
                   <input type="text" class="form-control mx-3  rounded-3 @error ('name') is-invalid @enderror" name="name"   value="{{ Auth::user()->name }}">

                 </div>
                 <div class="mt-3 mb-2 d-flex">
                    <span class="align-content-center text-dark"> Nickname:</span>
                    <input type="text" class="form-control mx-3  rounded-3 @error ('nickname') is-invalid @enderror" name="nickname"   placeholder="{{ old('nickname') }}" value="{{ Auth::user()->nickname }}">
                 </div>

                 <div class="mt-3 mb-2 d-flex">
                    <span class="align-content-center text-dark"> Address:</span>
                    <input type="text" class="form-control mx-3  rounded-3 @error ('address') is-invalid @enderror" name="address"   placeholder="{{ old('address') }}" value="{{ Auth::user()->address }}">
                 </div>
                 <div class="mt-3 mb-2 d-flex">
                    <span class="align-content-center text-dark">Phone:</span>
                    <input type="text" class="form-control mx-3  rounded-3 @error ('phone') is-invalid @enderror" name="phone"    value="{{ Auth::user()->phone }}">
                 </div>

                 <div class="mt-3 mb-2 d-flex">
                    <span class="align-content-center text-dark"> Email:</span>
                    <input type="email" class="form-control mx-3  rounded-3 @error ('email') is-invalid @enderror" name="email"    value="{{ Auth::user()->email }}">
                 </div>
                    <button class="btn sm btn-danger mt-3" type="submit"> Confirm </button>
            </form>
            <a href="{{ route('change#p') }}" class="btn btn-dark col-lg-mx-3 mt-3">
                Change Password
            </a>
               </div>

        </div>

    </div>
</div>
@endsection
