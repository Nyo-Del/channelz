@extends('dashboard')

@section('admincontent')

<div class="container rounded px-3 shadow-lg mt-3">

    <div class="row bg-white">
        <div class="col-lg-12 bg-dark rounded text-white mb-3 ">
            <div class="d-sm-flex align-items-center justify-content-between">
                <p class="mt-2  " > <i class="fa-solid fa-bars"></i> Product Information</p>
            </div>
        </div>
      <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4 col-md-6  col-sm-12 border shadow-lg rounded  w-0  h-100 mt-2 bg-white">
                <form action="{{route('mvnew',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="">
                    <div class="">
                        <img src="{{Storage::url('pic/noimage.jpg' )}}" alt="" class="w-75 h-50  rounded mx-5 mt-4 " id="output" >
                    </div>
                    @error('image')
                    <span class="d-flex justify-content-center">
                    <small class="text-danger"> {{ $message }} </small>
                    </span>
                    @enderror
                    <div class="d-flex justify-content-center">
                        <input type="file" class=" form-group mt-1 rounded bg-dark text-white mb-3  " name="image" onchange="loadFile(event)">
                    </div>
                </div>

            </div>
            <div class="col-lg-5 offset-lg-1 mt-2  col-md-6 col-sm-12">
                   <div class=" mb-2">
                   <div class="conatiner">
                    <div class="row">
                        <div class=" mt-2 mb-2">
                            <span class="">Movie Link: </span>
                            <span><input type="text" class=" form-control @error('Mlink') is-invalid @enderror" name="Mlink" value="{{ old('Mlink') }}"></span>
                         </div>
                        <div class="col-6">
                            <div class="mt-2 mb-2">
                                <span class="">Movie Name :</span>
                                <span><input type="text" class=" form-control @error('Mname') is-invalid @enderror" name="Mname" value="{{ old('Mname') }}"></span>
                             </div>
                             <div class="mt-2 mb-2">
                                <span class=""> Release Year: </span>
                                <span><input type="text" class=" form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}"></span>
                             </div>


                        </div>
                        <div class="col-6">
                            <div class="mt-2 mb-2">
                                <span class="">Category:</span>
                                <span>
                                    <select name="Cid" id="" class="form-control @error('Cid') is-invalid @enderror">
                                        <option value=""> Select Category </option>
                                        @foreach ($categories as $item)
                                        <option value="{{$item->id}}" @selected( old('Cid') == $item->id )> {{$item->Cname}} </option>
                                        @endforeach
                                    </select>
                                </span>
                             </div>
                             <div class="mt-2 mb-2">
                                <span class=""> Type : </span>
                                <select name="Mos" id="" class="form-control @error('Mos') is-invalid @enderror">
                                    <option value=""> Select Category </option>
                                    <option value="Movie" @selected( old('Mos') == 'Movie' )> Movie </option>
                                    <option value="Series" @selected( old('Mos') == 'Series' )> Series </option>


                                </select>
                             </div>


                        </div>
                        <div class="">
                            <span class="mx-2"> Description :</span>
                            <span><textarea placeholder="Product description...." name="description" id="" class="form-control mx-2 @error('description') is-invalid @enderror" cols="52" rows="5">
                                {{ old('description') }}
                            </textarea></span>
                         </div>

                        </div>
                    </div>
                   </div>
                        <button class="btn sm btn-danger mx-3 mb-4" type="submit">Creat New Product</button>
                    </form>
                     <a href="{{route('dashboard')}}" class="">
                        <button class="btn sm btn-dark mx-1 mb-4">Product List</button>
                       </a>

            </div>
        </div>
      </div>

    </div>

</div>



@endsection
