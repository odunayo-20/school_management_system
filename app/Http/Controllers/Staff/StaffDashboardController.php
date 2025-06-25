<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StaffDashboardController extends Controller
{
    public function index(){
        return view('staff.index');
    }

    public function staff_profile()
    {
        return view('staff.profile.index');
    }

    public function change_password()
    {
        return view('staff.profile.change_password');
    }


    public function staff_logout()
    {
        Auth::guard('staff')->logout();
        return redirect(route('staff_login'));
    }
}
