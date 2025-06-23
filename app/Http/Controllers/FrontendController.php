<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Event;
use App\Models\Classes;
use App\Models\Contact;
use App\Models\Gallery;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public $post_per_page = 5;
    public $posts_per_page = 5;


    public function index(){
        return view('frontend.frontend-index');
    }
    public function about(){
        return view('frontend.frontend-about');
    }
    public function admission(){
        $classes = Classes::paginate(10);

        return view('frontend.frontend-admission', compact('classes'));
    }
    public function academics(){
        return view('frontend.frontend-academics');
    }
    public function contact(){
        return view('frontend.frontend-contact');
    }
    public function contactSubmit(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'message' => 'required|string',
            'subject' => 'required|string',
            'name' => 'required|string',
        ]);

        Contact::create($validated);
        session()->flash('success', 'Contact Successfully Created');

        return redirect(route('contact'));

    }
    public function service(){
        return view('frontend.frontend-service');
    }
    public function gallery(){
        $gallery = Gallery::paginate($this->posts_per_page);
        $classroom = Gallery::where('category', 'classroom')->paginate($this->posts_per_page);
        $hostel = Gallery::where('category', 'hostel')->paginate($this->posts_per_page);
        $library = Gallery::where('category', 'library')->paginate($this->posts_per_page);
        $laboratory = Gallery::where('category', 'laboratory')->paginate($this->posts_per_page);
        return view('frontend.frontend-gallery', compact(['gallery', 'laboratory', 'hostel', 'library','classroom']));
    }
    public function event(){

        $events = Event::paginate(10);
        $latestEvents = Event::latest()->where('date', '>=', now())->where('status', 0)->paginate($this->post_per_page);
        $pastEvents = Event::latest()->where('date', '<=', now())->where('status', 0)->limit(4)->get();
        return view('frontend.frontend-event', compact(['events', 'latestEvents', 'pastEvents']));
    }


    public function eventView($slug){
        $event = Event::where('slug', $slug)->first();
        if($event){

            $events = Event::latest()->where('status', 0)->where('date', '>=', now())->where('id', '!=' ,$event->id)->limit(6)->get();
            return view('frontend.frontend-event-read', compact(['event', 'events']));
        }else{
            return redirect(route('notFound'));
        }

    }


    public function notFound(){
        return view('frontend.404-page');
    }
    public function guideline(){
        return view('frontend.frontend-guideline');
    }
    public function news(){
        $news = News::paginate(10);

        return view('frontend.frontend-news', compact('news'));
    }
    public function newsRead(){
        return view('frontend.frontend-news-read');
    }
}
