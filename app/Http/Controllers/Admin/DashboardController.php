<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }



    public function admin_profile()
    {
        return view('admin.profile.index');
    }

    public function change_password()
    {
        return view('admin.profile.change_password');
    }

    public function change_password_submit(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required',
            'Confirm_password' => 'required|same:password',
        ]);


        $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);
        if (!Hash::check($request->old_password, $admin->password)) {
            return back()->withErrors(['old_password' => 'The password is incorrect.']);
        }
        $admin->password = Hash::make($request->password);
        $admin->save();

        session()->flash('success', 'Admin Password Successfully Updated');
        return redirect(route('admin_change_password'));
    }



    public function admin_logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin_login'));
    }
}
