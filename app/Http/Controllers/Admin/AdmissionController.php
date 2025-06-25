<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
    {
        return view("admin.admission.index");
    }

    public function view($admission)
    {
        $admission = Admission::findOrFail($admission);

        return view('admin.admission.view', compact('admission'));
    }
}
