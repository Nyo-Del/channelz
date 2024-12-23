<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use App\Models\Movie;
use App\Models\statu;
use App\Models\userrv;
use App\Models\adminrv;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    //
    public function ban($id){

        $oldimage = User::where('id', $id)->value('picture');
        if ($oldimage && Storage::disk('public')->exists('pic/'.$oldimage)) {
            // Delete the old image from the public storage
            Storage::disk('public')->delete('pic/'.$oldimage);
        }
        User::where('id', $id)->delete();

        return back();
    }



    public function list($id = null){
    $all = User::paginate(4);
    $admins = [];

    if ($id != null) {
        $admins = User::where('id', $id)->get();
        //dd($admins);
    }

    return view('adminlist', compact('all', 'admins'));
}


    public function webdash(){
        $vc = Movie::select('view_count')->sum('view_count');
        $ad = Ad::select('id')->get();
        $price = Ad::sum('ads_price');
        $admin = User::select('id')->get();
        $userrv = userrv::paginate(3);
        $adminrv = adminrv::select('id','user_id','description','username')->paginate(2);

        return view('web',compact('userrv','adminrv','admin','ad','price','vc'));
    }

    public function details($id){

        $vc = Movie::where('id', $id)->increment('view_count');
        $category = Movie::where('id',$id)->value('Cid');
        $related = Movie::where('Cid',$category)->where('id', '!=', $id)->paginate(4);
        $details = Movie::where('movies.id',$id)
                        ->select('users.name as username','users.nickname as usernick','categories.Cname as category_name','movies.view_count','movies.id','movies.Mname','movies.Mpic','movies.Mlink','movies.year','movies.description','movies.Mos','movies.created_at')
                        ->leftJoin('categories','movies.Cid','categories.id')
                        ->leftJoin('users','movies.createdby_id','users.id')
                        ->get()
                        ;
        //dd($details);
        //dd($related);
        //dd($category);
        return view('userdetail',compact('details','related'));
    }

    public function edit($id){
        $details = Movie::where('id',$id)->get();
        $categories = Category::select('id','Cname')->get();
        return view('editdeatil',compact('details','categories'));
    }

    public function addnew(){
        return view('addnew');
    }

    public function back(){
        return to_route('dashboard');
    }

    public function profile(){
    return view('Profile');
    }

    public function upload(){
        $categories = Category::select('id','Cname')->get();

        return view('mvupload',compact('categories'));
    }

    public function create(){
        $categories = Category::select('id','Cname')->paginate(5);

        return view('categories',compact('categories'));
    }

    public function ads(){
        return view('ads');
    }

    public function change(){
        return view('changepassword');
    }

    public function new(Request $request){
       // dd($request->all());
       $this->vali($request);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role'=>$request->role,
            'password' => Hash::make($request->password),
        ]);
        Alert::success('Success', 'New Admin is Created');
        return back();
    }

    private function vali(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'role'=>'required',
            'password' => 'required',
        ]);
    }


}
