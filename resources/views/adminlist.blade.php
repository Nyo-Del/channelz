@extends('dashboard')

@section('admincontent')


<div class="container bg-white px-5 pb-5 pt-5  border border-left-primary rounded mb-5 mt-3">

    <div class="row">

        <div class="col-lg-6 col-md-12 col-sm-12  mx-md-0 mx-sm-0 ">
            <h4 class="text-dark mb-5 "> Let's view acccounts   </h4>
            <p>Things You must know before creating an account</p>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Phone</th>
                      <th scope="col">View Details</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        @foreach ($all as $item)
                        <td >{{ $item->nickname ? $item->nickname : $item->name  }}</td>
                        <td >{{$item->phone}}</td>
                        <td>
                         <div class="d-flex justify-content-evenly ">
                         <form action="{{route('adminlist',$item->id)}}" method="GET">
                            <button class="btn btn-success btn-sm ">
                                <i class="fa-solid fa-circle-info"></i>
                            </button>
                         </form>
                          @if ($item->role != 'Developer')
                          <a href='{{route('ban',$item->id)}}' class="btn btn-danger btn-sm ">
                            <i class="fa-solid fa-ban"></i>
                        </a>
                          @endif
                         </div>
                        </td>
                      </tr>
                        @endforeach
                  </tbody>
            </table>
            <div class="d-flex justify-content-center mt-2 " >
                <span class="">{{ $all->links() }}</span>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-12 border shadow-lg  rounded">
                 <form action="{{route('addnew')}}" class="form" enctype="multipart/form-data" method="POST">
                @csrf
                        @if ($admins != null)
                        <div class="container  ">
                            @foreach ($admins as $admin)
                            <div class="row">
                               <div class="col-lg-5 col-sm-6 col-lg-mb-5 col-lg-mx-3 ">
                                   <div class="">

                                      <div class="col-lg-mt-5 col-lg-mb-4 col-md-mt-5 col-md-mb-4">
                                       <p class="mx-2 px-2 text-center bg-dark text-light rounded "> Admin Info</p>
                                       <img src="{{ Storage::url( $admin->picture == null ?'pic/undraw_profile.svg' : 'pic/'.$admin->picture) }}" alt="" class="img w-100 rounded d-none d-lg-inline d-md-inline d-sm-inline" id="output">
                                      </div>

                                   </div>
                               </div>
                               <div class="col-lg-6 col-sm-6 mb-5 col-lg-mt-4 ">

                                   <div class="d-flex  mt-3">
                                       <span class=" align-content-center">Name:</span>
                                       <input type="text" name= 'name' class="form-control col-lg-mx-2 col-sm-mx-0 " value="{{ $admin->name }}" disabled>
                                   </div>
                                   <div class="d-flex mt-3 ">
                                       <span class=" align-content-center">Email:</span>
                                       <input type="email" name= 'email' class="form-control col-lg-mx-2 col-sm-mx-0  r" value="{{$admin->email}}" disabled>
                                   </div>
                                   <div class="d-flex  mt-3">
                                       <span class=" align-content-center">Phone:</span>
                                       <input type="text" name= 'phone' class="form-control col-lg-mx-2 col-sm-mx-0 " value="{{ $admin->phone }}" disabled>
                                   </div>
                                   <div class="d-flex mt-3 ">
                                       <span class=" align-content-center">Created:</span>
                                       <input type="text" name= 'password' class="form-control col-lg-mx-2 col-sm-mx-0 " value="{{ $admin->created_at }}" disabled>
                                   </div>

                                   <div class="d-flex mt-3 ">
                                    <label for="role " class=" align-content-center ">Role:</label>
                                      <select name="role" class="form-control col-lg-mx-3 col-sm-mx-0 px-4 " disabled >
                                       <option value="">{{$admin->role}}</option>
                                      </select>
                                   </div>
                                   @if ($admin->role != 'Developer')
                                   <div class="mt-3 ">
                                    <a href="{{route('ban',$admin->id)}}" class="btn btn-sm btn-danger form-control" >Ban<i class="fa-solid fa-ban mx-1"></i></a>
                                </div>
                                   @endif
                               </div>
                            </div>
                            @endforeach
                        </div>

                        @else
                        <div class="container ">
                            <div class="row">
                               <div class="col-lg-5 col-sm-6 col-lg-mb-5 col-lg-mx-3 ">
                                   <div class="">

                                      <div class="col-lg-mt-5 col-lg-mb-4 col-md-mt-5 col-md-mb-4">
                                       <p class="mx-2 px-2 text-center bg-dark text-light rounded "> Admin Info</p>
                                       <img src="{{ Storage::url('pic/undraw_profile.svg') }}" alt="" class="img w-100 rounded d-none d-lg-inline d-md-inline d-sm-inline" id="output">
                                      </div>

                                   </div>
                               </div>
                               <div class="col-lg-6 col-sm-6 mb-5 col-lg-mt-4 ">

                                   <div class="d-flex  mt-3">
                                       <span class=" align-content-center">Name:</span>
                                       <input type="text" name= 'name' class="form-control col-lg-mx-2 col-sm-mx-0 " disabled>
                                   </div>
                                   <div class="d-flex mt-3 ">
                                       <span class=" align-content-center">Email:</span>
                                       <input type="email" name= 'email' class="form-control col-lg-mx-2 col-sm-mx-0"disabled>
                                   </div>
                                   <div class="d-flex  mt-3">
                                       <span class=" align-content-center">Phone:</span>
                                       <input type="text" name= 'phone' class="form-control col-lg-mx-2 col-sm-mx-0 " disabled>
                                   </div>
                                   <div class="d-flex mt-3 ">
                                       <span class=" align-content-center">Created:</span>
                                       <input type="text" name= 'password' class="form-control col-lg-mx-2 col-sm-mx-0 "disabled>
                                   </div>

                                   <div class="d-flex mt-3 ">
                                    <label for="role " class=" align-content-center ">Role:</label>
                                      <select name="role" class="form-control col-lg-mx-3 col-sm-mx-0 px-4 " disabled>
                                       @error('role')
                                       <option value="" class="">Need to Fill</option>
                                       @enderror
                                       <option value="">Select Role</option>
                                       <option value="super admin">Superadmin</option>
                                       <option value="admin">Admin</option>
                                      </select>
                                   </div>
                                   <div class="mt-3 ">
                                       <button type="submit" class="btn btn-sm btn-danger form-control" disabled>Ban<i class="fa-solid fa-ban mx-1"></i></button>
                                   </div>
                               </div>
                            </div>
                        </div>

                        @endif
             </form>
        </div>
    </div>
</div>

@endsection
