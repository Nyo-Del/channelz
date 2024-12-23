<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    //
    public function create(Request $request){
        $this->vali($request);
        Category::create([
            'Cname'=>$request->Cname,
        ]);
        Alert::success('Success!','New Category Has Been Created');

        return back();
    }

    public function delete($id){
        Category::where('id',$id)->delete();
        Alert::success('Delete Success!');
        return back();
    }

    private function vali(Request $request){
        $request->validate([
            'Cname' => ['required','unique:categories,Cname'],
        ]);
    }
}
