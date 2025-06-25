<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index(){
        return view('student.index');
    }

    public function student_profile()
    {
        return view('student.profile.index');
    }

    public function change_password()
    {
        return view('student.profile.change_password');
    }


    public function student_logout()
    {
        Auth::guard('student')->logout();
        return redirect(route('student_login'));
    }
}
