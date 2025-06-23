<?php

namespace App\Livewire\Admin\News;

use App\Models\News;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{

    public $news_id;

    use WithPagination;

    #[Url(history:true)]
    public $search = '';
    public $pagination = 10;

    public $newsPublish = [];

    public $newsDraft = [];
#[On('status-updated')]
    public function mount()
    {
        $this->newsPublish = News::where('status', '0')->get();
        $this->newsDraft = News::where('status', '1')->get();
    }


    public function updateStatus($newsId, $newStatus)
    {
        $news = News::find($newsId);
        $news->update(['status' => $newStatus]);
        $this->dispatch('status-updated');
    }




    public function delete($news_id){

        $this->news_id = $news_id;
    }

    public function destroy(){
        $news =  News::findOrFail($this->news_id);
        $news->delete();
        if(Storage::disk('local')->exists($news->image)){
            Storage::delete($news->image);
            $news->delete();
        }
        $this->dispatch('close-modal');
        session()->flash('success', 'News is Successfully Deleted');
    }


    public function render()
    {
        if (!$this->search) {

            $news = News::latest()->paginate($this->pagination);
        } else {

            $news = News::latest()->where('title', 'like', '%'.$this->search.'%')->paginate($this->pagination);
        }

        return view('livewire.admin.news.index', compact('news'));
    }
}
