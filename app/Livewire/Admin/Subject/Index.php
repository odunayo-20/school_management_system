<?php

namespace App\Livewire\Admin\Subject;

use App\Models\Subject;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    #[Url(history:true)]
    public $search = '';
    public $pagination = 10;
    public $subject_id;
    public $name, $subject, $status;




    public function storeSubject()
    {
        $this->validate([
            'name' => 'required|string',
            // 'slug' => 'required|string',
        ]);

        Subject::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'status' => $this->status == true ? '1' : '0',
        ]);

        session()->flash('success', 'Subject Successfully Created');
        $this->reset();

        $this->dispatch('close-modal');
    }

    public function editSubject(Subject $subject)
    {

        $this->subject = $subject;
        $this->name = $subject->name;
        $this->status = $subject->status == '1' ? true : false;
    }



    public function updateSubject()
    {
        $this->validate([
            'name' => 'required|string',
            // 'slug' => 'required|string',
        ]);

        $this->subject->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'status' => $this->status == true ? '1' : '0',

        ]);
        session()->flash('success', value: 'Subject Successfully Updated');
        $this->reset();
        $this->dispatch('close-modal');
    }

    public function deleteSubject($subject)
    {
        // dd($class);
        $this->subject = $subject;
    }
    public function destroySubject()
    {
        Subject::findOrFail($this->subject)->delete();
        session()->flash('success', 'Subject Successfully Deleted');
        $this->reset();
        $this->dispatch('close-modal');
    }

    public function updateStatus($subjectId, $newStatus)
    {
        $subject = Subject::find($subjectId);
        $subject->update(['status' => $newStatus]);
    }

    public function render()
    {


        if (!$this->search) {

            $subjects = Subject::latest()->paginate($this->pagination);
        } else {

            $subjects = Subject::latest()->where('name', 'like', '%'.$this->search.'%')->paginate($this->pagination);
        }
        return view('livewire.admin.subject.index', compact('subjects'));
    }
}
