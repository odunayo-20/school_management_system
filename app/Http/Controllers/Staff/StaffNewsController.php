<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class StaffNewsController extends Controller
{
    public function index()
    {
        return view("staff.news.index");
    }

    public function view($news)
    {
        $news = News::where('slug',$news)->first();
        return view('staff.news.view', compact('news'));
    }

}
