<?php

namespace App\Livewire\Staff\Event;

use App\Models\Event;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Index extends Component
{


    use WithPagination;

    #[Url(history: true)]
    public $search = '';
    public $pagination = 10;

    public $eventsPublish = [];
    public $eventsDraft = [];


    public function render()
    {
        $eventCount = Event::where('status', 0)->get();
        if (!$this->search) {

            $events = Event::latest()->where('status', 0)->paginate($this->pagination);
        } else {

            $events = Event::latest()->where('status', 0)->where('title', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        }
        return view('livewire.staff.event.index', compact(['events', 'eventCount']));
    }

}
