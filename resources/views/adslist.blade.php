@extends('dashboard')
@section('admincontent')

<div class="container bg-white px-5 pb-5 pt-5  border border-left-primary rounded mb-5 mt-3">

    <div class="row">

        <div class="col-lg-8 col-md-12 col-sm-12  mx-md-0 mx-sm-0 ">
            <h4 class="text-dark mb-2 "> Viewing Ads List</h4>
            <p>Things You must know before creating an account</p>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Price</th>
                      <th scope="col">View Details</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        @foreach ($list as $item)
                        <td >{{$item->adname}}
                            <span class="text-muted">
                                ({{ $item->action == '1' ?  "View" : 'Hide' }})
                            </span>
                        </td>
                        <td >{{$item->ads_price}}</td>
                        <td>
                         <div class="d-flex  justify-content-around ">


                              <div class="d-flex mt-1 ">
                                <form action="{{route('adlist',$item->id)}}" method="GET" >
                                    <button class="btn btn-success btn-sm mx-1">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </button>
                                 </form>
                                  <form action='{{route('addelete',$item->id)}}'>
                                    <button class="btn btn-danger btn-sm mx-1 ">
                                    <i class="fa-solid fa-trash"></i>
                                    </button>
                                  </form>
                              </div>
                         </div>
                        </td>
                      </tr>
                        @endforeach
                  </tbody>
            </table>
            <div class="d-flex justify-content-center mt-2 " >
                <span class="">{{ $list->links() }}</span>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 col-md-12 border shadow-lg  rounded ">
                        @if ($ads != null)
                        <div class="container mb-3 ">
                            @foreach ($ads as $ad)
                            <div class="row">
                               <div class="col-lg-10 offset-lg-1  col-md-8 offset-md-2  col-sm-8 offset-sm-2 col-lg-mb-5 col-lg-mx-3  ">
                                   <div class="">

                                      <div class="col-lg-mt-5 col-lg-mb-4 col-md-mt-5 col-md-mb-4">
                                       <p class="mx-2 px-2 text-center bg-dark text-light rounded "> Photo</p>
                                       <img src="{{ Storage::url('adpic/' . $ad->adpic) }}" alt="" class="img w-100 rounded" id="output">
                                      </div>

                                   </div>
                               </div>
                               <form action="{{ route('adaction', $ad->id) }}" method="POST">
                                @csrf
                                <div class="d-flex mt-3">
                                    <select name="action" id="" class="form-control">
                                        <option value="1" class="text-center" @selected($ad->action == '1') >View</option>
                                        <option value="2" class="text-center" @selected($ad->action == '2') >Hide</option>
                                    </select>
                                    <button class="btn btn-sm btn-dark mx-1 ">Sumbit</button>
                                </div>
                            </form>
                            </div>
                            @endforeach
                        </div>

                        @endif
        </div>
    </div>
</div>




@endsection
