<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\adminrv;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminrvController extends Controller
{
    //
    public function delete($id){
        adminrv::where('id',$id)->delete();
        return back();

    }



    public function adminrv($id,Request $request){

        $username = User::where('id', $id)->value('name');
        $this->vali($request);
        adminrv::create([
            'user_id' => $id,
            'username' => $username,
            'description' => $request->description,
        ]);
        Alert::success('Success', 'Thanks For Ur Feedback!');
        return back();

    }

    public function vali(Request $request){
        $request -> validate([
            'description' => 'required',
        ]);
    }
}
