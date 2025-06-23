<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
