<?php

namespace App\Livewire\Staff\News;

use App\Models\News;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Index extends Component
{


    use WithPagination;

    #[Url(history: true)]
    public $search = '';
    public $pagination = 10;

    public $newsPublish = [];
    public $newsDraft = [];


    public function render()
    {
        $newsCount = News::where('status', 0)->get();
        if (!$this->search) {

            $news = News::latest()->where('status', 0)->paginate($this->pagination);
        } else {

            $news = News::latest()->where('status', 0)->where('title', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        }
        return view('livewire.staff.news.index', compact(['news', 'newsCount']));
    }


    // public function render()
    // {
    //     return view('livewire.staff.news.index');
    // }
}
