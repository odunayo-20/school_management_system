<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffAssignmentController extends Controller
{
    public function index()
    {
        return view("staff.assignment.index");
    }
    public function create()
    {
        return view("staff.assignment.create");
    }
    public function edit()
    {
        return view("staff.assignment.edit");
    }
    public function submit()
    {
        return view("staff.assignment.submit");
    }
}
