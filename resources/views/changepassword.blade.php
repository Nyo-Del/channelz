@extends('dashboard')

@section('admincontent')


<div class="container bg-white px-5 pb-5 pt-5  border border-left-primary rounded mb-5 mt-3">

    <div class="row">

        <div class="col-lg-4 col-md-12 col-sm-12  mx-md-0 mx-sm-0 ">
            <h4 class="text-dark mb-3 "> Let's change password   </h4>
            <p>Things You must know before changing password</p>
            <p class="d-none d-lg-inline d-md-inline d-sm-inline">Change your password regularly to keep your account secure. Use a strong combination of letters, numbers, and symbols. Simply go to settings, enter your current password, and set a new one to protect your account. </p>
            <p>About Roles</p>
           <p>You can't change old password as New one.(Min: 6, Max: 15)</p>
        </div>
        <div class="col-lg-8 col-sm-12 col-md-12 border shadow-lg  rounded">
                 <form action="{{route('changepassword#')}}" class="form"  method="POST">
                @csrf
                <div class="container   ">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-lg-mb-5 col-lg-mx-3 ">
                            <div class="">

                               <div class="col-lg-mt-5 col-lg-mb-4 col-md-mt-5 col-md-mb-4">
                                <p class="mx-2 px-2 text-center bg-dark text-light rounded ">{{Auth::user()->name}}</p>
                                <img src="{{ Storage::url('pic/password2.jpg') }}" alt="" class="img w-100 rounded " id="output">
                               </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 mb-5 col-lg-mt-4 mt-3 ">
                            <div class=" mt-1 ">
                                <span class=" ">Old Password:</span>
                                <input type="password" name= 'oldpassword' class="form-control col-lg-mx-2 col-sm-mx-0 @error('oldpassword')is-invalid @enderror " value="{{ old('oldpassword') }}">
                            </div>
                            <div class=" mt-1 ">
                                <span class=" ">New Password:</span>
                                <input type="password" name= 'newpassword' class="form-control col-lg-mx-2 col-sm-mx-0 @error('newpassword')is-invalid @enderror " value="{{ old('password') }}">
                            </div>
                            <div class=" mt-1 ">
                                <span class=" ">Comfirm Password:</span>
                                <input type="password" name= 'comfirmpassword' class="form-control col-lg-mx-2 col-sm-mx-0 @error('comfirmpassword')is-invalid @enderror " value="{{ old('comfirmpassword') }}">
                            </div>


                            <div class="mt-3 ">
                                <button type="submit" class="btn btn-sm btn-danger form-control">Change Now</button>
                            </div>
                        </div>
                    </div>
                   </div>
             </form>
        </div>
    </div>
</div>

@endsection
