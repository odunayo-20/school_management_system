<?php

namespace App\Http\Controllers\Staff;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffEventController extends Controller
{
    public function index()
    {
        return view("staff.event.index");
    }

    public function view($event)
    {
        $event = Event::findOrFail($event);
        return view('staff.event.view', compact('event'));
    }

}
