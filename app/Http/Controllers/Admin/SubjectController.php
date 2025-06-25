<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::get();
        return view('admin.subject.index', $subjects);
    }
    public function create()
    {
        return view('admin.subject.create');
    }
}
