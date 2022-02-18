<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function profile()
    {
        $admin = Admin::find(1);
        return view('admin.profile', compact('admin'));
    }

    public function edit()
    {
        $admin = Admin::find(1);
        return view('admin.profile_edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = Admin::find(1);
        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/' . $admin->profile_photo_path));
            $fileName = date('YmHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $fileName);
            $admin->profile_photo_path = $fileName;
        }

        $admin->save();

        $nofit = [
            'message' => "Admin Profile Updated Successfully",
            "alert-type" => 'success',
        ];

        return redirect()->back()->with($nofit);
    }

    public function changePassword()
    {
        return view('admin.change_password');
    }

    public function updatePassword(Request $request)
    {
        $admin = Admin::find(1);
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->current_password, $admin->password)) {

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
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->back()->with($notif);

    }
}
