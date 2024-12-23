<?php

namespace App\Http\Controllers;

use App\Models\userrv;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserrvController extends Controller
{
    //

    public function delete($id){
        userrv::where('id',$id)->delete();
        return back();
    }

    public function userrv(Request $request){
        $this->vali($request);
        userrv::create([
            'user' => '1',
            'description' => $request->description,
        ]);
        Alert::success('Thank You!','Thanks For Your Feedback');
        return back();
    }

    public function vali(Request $request){
        $request->validate([
            'description' => 'required',
        ]);
    }
}
