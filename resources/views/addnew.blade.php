@extends('dashboard')

@section('admincontent')


<div class="container bg-white px-5 pb-5 pt-5  border border-left-primary rounded mb-5 mt-3">

    <div class="row">

        <div class="col-lg-6 col-md-12 col-sm-12  mx-md-0 mx-sm-0 ">
            <h4 class="text-dark mb-5 "> Let's Create Admin Accounts  </h4>
            <p>Things You must know before creating an account</p>
            <p class="d-none d-lg-inline d-md-inline d-sm-inline">Roles and permissions define access levels. Admins can manage content and users, while only the Super Admin can add new admins, create ads, and view web activity logs, ensuring secure control over sensitive actions.</p>
            <p>About Roles</p>
           <p>Super admin can control and ban admin.Only superadmin view the Web activity.</p>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-12 border shadow-lg  rounded">
                 <form action="{{route('addnew')}}" class="form" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="container   ">
                    <div class="row">
                        <div class="col-lg-5 col-sm-6 col-lg-mb-5 col-lg-mx-3 ">
                            <div class="">

                               <div class="col-lg-mt-5 col-lg-mb-4 col-md-mt-5 col-md-mb-4">
                                <p class="mx-2 px-2 text-center bg-dark text-light rounded ">Adding New Admin</p>
                                <img src="{{ Storage::url('pic/undraw_profile.svg') }}" alt="" class="img w-100 rounded d-none d-lg-inline d-md-inline d-sm-inline" id="output">
                               </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 mb-5 col-lg-mt-4 ">

                            <div class="d-flex  mt-3">
                                <span class=" align-content-center">Name:</span>
                                <input type="text" name= 'name' class="form-control col-lg-mx-2 col-sm-mx-0  @error('name')is-invalid @enderror" value="{{ old('name') }}">
                            </div>
                            <div class="d-flex mt-3 ">
                                <span class=" align-content-center">Email:</span>
                                <input type="email" name= 'email' class="form-control col-lg-mx-2 col-sm-mx-0  @error('email')is-invalid @enderror" value="{{ old('email') }}">
                            </div>
                            <div class="d-flex  mt-3">
                                <span class=" align-content-center">Phone:</span>
                                <input type="text" name= 'phone' class="form-control col-lg-mx-2 col-sm-mx-0  @error('phone')is-invalid @enderror" value="{{ old('phone') }}">
                            </div>
                            <div class="d-flex mt-3 ">
                                <span class=" align-content-center">Password:</span>
                                <input type="text" name= 'password' class="form-control col-lg-mx-2 col-sm-mx-0 @error('password')is-invalid @enderror " value="{{ old('password') }}">
                            </div>

                            <div class="d-flex mt-3 ">
                             <label for="role " class=" align-content-center ">Role:</label>
                               <select name="role" class="form-control col-lg-mx-3 col-sm-mx-0 px-4 " >
                                @error('role')
                                <option value="" class="">Need to Fill</option>
                                @enderror
                                <option value="">Select Role</option>
                                <option value="superadmin">Superadmin</option>
                                <option value="admin">Admin</option>
                               </select>
                            </div>
                            <div class="mt-3 ">
                                <button type="submit" class="btn btn-sm btn-danger form-control">Add+</button>
                            </div>
                        </div>
                    </div>
                   </div>
             </form>
        </div>
    </div>
</div>

@endsection
