<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(){
        return view('admin.staff.index');
    }

    public function view($id){
        $staff = Staff::findOrFail($id);
        return view('admin.staff.view', compact('staff'));
    }
    public function edit($id){
        $staff = Staff::findOrFail($id);
        return view('admin.staff.edit', compact('staff'));
    }
}
