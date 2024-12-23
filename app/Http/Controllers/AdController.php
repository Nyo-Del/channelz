<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdController extends Controller
{

    public function action($id,Request $request){
        $action = $request->action;
        //dd($action);
        Ad::where('id',$id)->update([
            'action'=>$action,
        ]);
        return back();
    }


    public function delete($id){
        $oldimage = Ad::where('id', $id)->value('adpic');

        if ($oldimage && Storage::disk('public')->exists('adpic/' . $oldimage)) {
            // Delete the old image from the 'adpic' directory
            Storage::disk('public')->delete('adpic/' . $oldimage);
        }

        // Delete the ad from the database
        Ad::where('id', $id)->delete();

        Alert::success('Ads deleted', 'Ads has been deleted');
        return back();
    }


    public function list($id = null){
        $list = Ad::paginate(4);
        $ads = [];
        if ($id != null) {
            $ads = Ad::where('id', $id)->get();
        }
        return view('adslist',compact('list','ads'));
    }


    public function adcreate(Request $request){
        $this->vali($request);
        //dd($request->all());
        $filename = uniqid() . $request->file('adpic')->getClientOriginalName();
        $request->file('adpic')->storeAs('adpic', $filename, 'public');

        Ad::create([
            'adname' => $request->adname,
            'adpic' => $filename,
            'ads_price' => $request->ads_price,
            'adlink' => $request->adlink,
            'action' => '1',
        ]);

        Alert::success('New Ads Uploaded', 'New Ads is only the way');
        return back();
    }

    public function vali(Request $request){
        $request->validate([
            'adname' => 'required',
            'adpic' => 'required',
            'ads_price' => 'required',
        ]);
    }
}
