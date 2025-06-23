<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view("admin.contact.index");
    }
    public function veiw()
    {
        return view("admin.contact.veiw");
    }
}
