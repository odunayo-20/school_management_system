<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view("admin.contact.index");
    }
    public function view($contact)
    {
        $contact = Contact::findOrFail($contact);
        return view("admin.contact.view", compact('contact'));
    }
}
