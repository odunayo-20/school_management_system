<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Admin;
use App\Models\Event;
use App\Models\Staff;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Student;
use App\Models\Admission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExternalFeesAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $staff = Staff::get();
        $student = Student::get();
        $admission = Admission::get();
        $event = Event::get();
        $news = News::get();
        $gallery = Gallery::get();
        $contact = Contact::get();
        $schoolFeesAdmin = ExternalFeesAdmin::get();

        $subscriptions= [
            ['Day'=>'Donate Total', 'Value'=>count($staff)],
            ['Day'=>'Contact', 'Value'=>count($student)],
            ['Day'=>'Event', 'Value'=>count($event)],
            ['Day'=>'Team', 'Value'=>count($news)],
            ['Day'=>'Testimonial', 'Value'=>count($gallery)],
            ['Day'=>'Testimonial', 'Value'=>count($contact)],
                ];


        return view('admin.index', compact(['subscriptions', 'staff', 'student', 'event', 'gallery', 'news', 'admission', 'contact', 'schoolFeesAdmin']));
    }



    public function admin_profile()
    {
        return view('admin.profile.index');
    }

    public function change_password()
    {
        return view('admin.profile.change_password');
    }

    public function change_password_submit(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required',
            'Confirm_password' => 'required|same:password',
        ]);


        $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);
        if (!Hash::check($request->old_password, $admin->password)) {
            return back()->withErrors(['old_password' => 'The password is incorrect.']);
        }
        $admin->password = Hash::make($request->password);
        $admin->save();

        session()->flash('success', 'Admin Password Successfully Updated');
        return redirect(route('admin_change_password'));
    }



    public function admin_logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin_login'));
    }
}
