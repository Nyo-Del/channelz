<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{

    //change password
    public function changepassword(Request $request){
       // dd("Hi");
       $userid = Auth::user()->id;
        $oldpw = Auth::user()->password;
        $oldpassword = $request->oldpassword;
        //dd($oldpassword,$oldpw);
        $this->Change($request);
        if(Hash::check($request->comfirmpassword,$oldpw)){
            Alert::error('Error', 'Old Password Cant Be New Password!');
            return back();

        }
        if (Hash::check($oldpassword,$oldpw)) {
            User::where('id',$userid)->update([
                'password' => Hash::make($request->comfirmpassword),
            ]);
            Alert::success('Password Changed', 'New Password is set.');

            return back();
        } else {
            Alert::warning('Wrong Password', 'Old Password is incorrect.');
            return back();
        }

    }

    public function Change(Request $request){
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|min:6|max:15',
            'comfirmpassword' => 'required|same:newpassword',
        ]);
    }

    // acc edit
    public function editpf($id,Request $request){
        //dd($id);
        $this->vali($request);
        $old = Auth::user()->picture;

        if ($request->hasFile('image')) {
            // Generate a unique filename for the uploaded image
            $filename = uniqid() . $request->file('image')->getClientOriginalName();

            // Store the uploaded image in the 'public/pic/' directory
            $request->file('image')->storeAs('pic', $filename, 'public');

            // If the user has an old image, delete it from the storage
            if ($old && Storage::disk('public')->exists('pic/' . $old)) {
                // Delete the old image
                Storage::disk('public')->delete('pic/' . $old);
            }

            // Update the user's record with the new information and image filename
            User::where('id', $id)->update([
                'name' => $request->name,
                'nickname' => $request->nickname,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'picture' => $filename,
            ]);
        } else {
            // If no new image is uploaded, just update the user's details
            User::where('id', $id)->update([
                'name' => $request->name,
                'nickname' => $request->nickname,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);
        }

        Alert::success('Success', 'Your profile has been updated');
        return back();
        //dd($request->all());
    }

    private function vali(Request $request){
       $request->validate([
        'name'=>'required',
        'phone'=>'required',
        'email'=>'required',
       ]);
    }





    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
