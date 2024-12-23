@extends('dashboard')

@section('admincontent')

<div class="container bg-white px-5 pb-5 pt-5  border border-left-primary rounded mb-5 mt-3">

    <div class="row">

        <div class="col-lg-6 col-md-12 col-sm-12  mx-md-0 mx-sm-0 ">

            <div class="d-none d-lg-inline d-md-inline d-sm-inline">
            <p> Movie categories help users quickly find their favorite genres, from action and romance to sci-fi and thrillers. Customize categories to suit your collection and make navigation seamless for all viewers </p>
        </div>
            <p class="">About Roles,</p>
           <p class="">Organize movies into categories for easy browsing and better user experience. Create genres like action, comedy, drama, or add custom categories to fit your platform’s needs. Keep your library structured and accessible.</p>

            <div class="col-lg-12 mb-4">
                <form action="{{ route('create') }}" method="POST">
                    @csrf
                    <input type="text" class="form-control @error('Cname') is-invalid @enderror" name="Cname">
                    <button class="btn btn-danger mt-2">Create<i class="fa-solid fa-plus mx-1 "></i></button>
                </form>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-12 border shadow-lg   rounded ">
                <div class="container   ">
                    <div class="row">
                        <div class="col-lg-5 col-sm-6 col-lg-mb-5 col-lg-mx-3 py-3">
                            <div class="">
                               <div class="col-lg-mt-5 col-lg-mb-4 col-md-mt-5 col-md-mb-4">
                                <p class="mx-2 px-2 text-center bg-dark text-light rounded ">Category List</p>
                                <img src="{{ Storage::url('pic/mvc2.jpg') }}" alt="" class="img w-100 rounded d-none d-lg-inline d-md-inline d-sm-inline" id="output">
                               </div>

                            </div>
                        </div>
                        <div class="col-lg-7 col-sm-6 mb-3 col-lg-mt-4 ">
                            @foreach ($categories as $item)
                            <div class="col-lg-10 offset-lg-1  px-2 py-1 rounded mt-2 border bg">
                                <div class="row  ">
                                    <div class="col-6">
                                        <span class=""><i class="fa-solid fa-list mx-2 text-success"></i><span class=""> {{ $item->Cname}} </span></span>
                                    </div>

                                        <div class="col-6 d-flex justify-content-end mt-1">
                                            <a href="{{route('c#delete',$item->id)}}">
                                                <i class="fa-solid fa-trash text-danger"></i>
                                            </a>
                                            </div>

                                </div>
                            </div>
                            @endforeach
                            <div class="d-flex justify-content-center mt-2 text-danger">
                                {{ $categories->links() }}
                            </div>




                        </div>
                    </div>
                   </div>

        </div>
    </div>
</div>

@endsection
