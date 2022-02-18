<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function edit()
    {
        $user = auth()->user();
        return view('frontend.profile.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/' . $user->profile_photo_path));
            $fileName = date('YmHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $fileName);
            $user->profile_photo_path = $fileName;
        }

        $user->save();

        $nofit = [
            'message' => "Profile Updated Successfully",
            "alert-type" => 'success',
        ];

        return redirect()->back()->with($nofit);
    }

    public function editPassword()
    {
        $user = auth()->user();
        return view('frontend.profile.edit_password', compact('user'));
    }

    public function updatePassword(User $user, Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->current_password, $user->password)) {

            $notif = [
                'message' => 'current password is wrong',
                'alert-info' => 'error',
            ];
            return redirect()->back()->with($notif);
        }

        $notif = [
            'message' => 'Password updated successfully',
            'alert-info' => 'success',
        ];
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with($notif);
    }

    public function userLogout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
