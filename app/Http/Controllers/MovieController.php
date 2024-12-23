<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MovieController extends Controller
{
    //
    public function Mvnew($id,Request $request){
        $userid = Auth::user()->id;
        $this->Vali($request);
        $filename = uniqid() . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('mvpic', $filename, 'public');

        Movie::create([
            'Mname' => $request->Mname,
            'year' => $request->year,
            'Mos' => $request->Mos,
            'Cid' => $request->Cid,
            'Mpic' => $filename,
            'description' => $request->description,
            'createdby_id' => $userid,
            'Mlink' => $request->Mlink,
        ]);

        Alert::success('Success', 'New Movie is Created');
        return back();

    }

    public function editmv($id,Request $request){
     $this->update($request);

     if ($request->hasFile('image')) {
        // Delete old image
        $oldimage = Movie::where('id', $id)->value('Mpic');

        // Check if the old image exists and delete it from the storage
        if ($oldimage && Storage::disk('public')->exists('mvpic/' . $oldimage)) {
            Storage::disk('public')->delete('mvpic/' . $oldimage);
        }

        // Upload the new image and store it in the 'mvpic' folder
        $filename = uniqid() . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('mvpic', $filename, 'public');

        // Update movie data with the new image
        Movie::where('id', $id)->update([
            'Mname' => $request->Mname,
            'year' => $request->year,
            'Mos' => $request->Mos,
            'Cid' => $request->Cid,
            'Mpic' => $filename,
            'description' => $request->description,
            'Mlink' => $request->Mlink,
        ]);
    } else {
        // Update movie data without image
        Movie::where('id', $id)->update([
            'Mname' => $request->Mname,
            'year' => $request->year,
            'Mos' => $request->Mos,
            'Cid' => $request->Cid,
            'description' => $request->description,
            'Mlink' => $request->Mlink,
        ]);
    }

    Alert::success('Success', 'The movie is Updated');

         return to_route('dashboard');
    }

    private function update(Request $request){
        $request->validate([
            'Mname' => 'required',
            'Mos' => 'required',
            'Cid' => 'required',
            'Mlink' => 'required',
        ]);
    }

    private function Vali(Request $request){
        $request->validate([
            'Mname' => 'required',
            'Mos' => 'required',
            'Cid' => 'required',
            'image' => 'required',
            'Mlink' => 'required',
        ]);
    }

    public function delete($id){
        $oldimage = Movie::where('id', $id)->value('Mpic'); // Fetches the Mpic value directly
        if ($oldimage && Storage::disk('public')->exists('mvpic/' . $oldimage)) {
            // Delete the old image from the storage
            Storage::disk('public')->delete('mvpic/' . $oldimage);
        }

        Movie::where('id', $id)->delete();
        Alert::success('Delete Success', 'The movie is now deleted');
        return back();
    }
}
