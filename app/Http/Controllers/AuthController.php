<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function studentLogin()
    {
        return view('');
    }
    public function staffLogin()
    {
        return view('staff.auth.staff-login');
    }

    public function staffForget()
    {
        return view('staff.auth.staff-forget');
    }
    public function staffRegister()
    {
        return view('staff.auth.staff-register');
    }

    public function staffLoginSubmit(Request $request)
    {
        $validated =  $request->validate([
            'email' => 'required|string|email|min:4|max:25',
            'password' => 'required|string|min:4|max:25'
        ]);

        $staffs = Auth::guard('staff')->attempt($validated);

        if ($staffs) {
            // dd($admins);
            session()->flash('success', 'Login Successfully');
            return redirect(route('staff_dashboard'));
        } else {
            session()->flash('error', 'Invalid Creditial');
            return redirect()->back();
        }
    }


    public function adminLogin()
    {
        return view('admin.auth.admin-login');
    }
    public function adminLoginSubmit(Request $request)
    {
        $validated =  $request->validate([
            'email' => 'required|string|email|min:4|max:25',
            'password' => 'required|string|min:4|max:25'
        ]);

        $admins = Auth::guard('admin')->attempt($validated);

        if ($admins) {
            // dd($admins);
            session()->flash('success', 'Login Successfully');
            return redirect(route('admin_dashboard'));
        } else {
            session()->flash('error', 'Invalid Creditial');
            return redirect()->back();
        }
    }


    public function adminForget()
    {
        return view('admin.auth.admin-forget');
    }
}
