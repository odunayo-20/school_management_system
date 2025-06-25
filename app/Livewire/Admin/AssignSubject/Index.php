<?php

namespace App\Livewire\Admin\AssignSubject;

use App\Models\Classes;
use App\Models\Subject;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Models\AssignSubject;

class Index extends Component
{

    #[Url(history:true)]
    public $subject, $AssignSubject;
    public $class,$status;
    public $search = '';
    public $pagination = 10;
    public $assignSubject_id;
    use WithPagination;

    public function storeAssignSubject()
    {
        $this->validate([
            'class' => 'required|string',
            'subject' => 'required|string',
        ]);

        AssignSubject::create([
            'class_id' => $this->class,
            'subject_id' => $this->subject,
            'status' => $this->status == true ? '1' : '0',
        ]);

        session()->flash('success', 'Assign Subject Successfully Created');
        $this->reset();

        $this->dispatch('close-modal');
    }

    public function editAssignSubject(AssignSubject $AssignSubject)
    {

        $this->AssignSubject = $AssignSubject;
        $this->subject = $AssignSubject->subject_id;
        $this->class = $AssignSubject->class_id;
        $this->status = $AssignSubject->status == '1' ? true : false;
    }



    public function updateAssignSubject()
    {

        $this->AssignSubject->update([
            'class_id' => $this->class,
            'subject_id' => $this->subject,
            'status' => $this->status == true ? '1' : '0',

        ]);
        session()->flash('success', value: 'Assign Subject Successfully Updated');
        $this->reset();
        $this->dispatch('close-modal');
    }

    public function deleteAssignSubject($AssignSubject)
    {
        // dd($AssignSubject);
        $this->AssignSubject = $AssignSubject;
    }
    public function destroyAssignSubject()
    {
        AssignSubject::findOrFail($this->AssignSubject)->delete();
        session()->flash('success', 'Assign Subject Successfully Deleted');
        $this->reset();
        $this->dispatch('close-modal');
    }

    public function updateStatus($AssignSubjectId, $newStatus)
    {
        $AssignSubject = AssignSubject::find($AssignSubjectId);
        $AssignSubject->update(['status' => $newStatus]);
    }


    public function render()
    {
        $classes = Classes::where('status', 0)->get();
        $subjects= Subject::where('status', 0)->get();

        if (!$this->search) {
            $AssignSubjects = AssignSubject::latest()
                ->with(['class', 'subject'])
                ->paginate($this->pagination);
        } else {
            $AssignSubjects = AssignSubject::latest()
                ->with(['class', 'subject'])
                ->whereHas('subject', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                          ->orWhere('slug', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('class', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                          ->orWhere('slug', 'like', '%' . $this->search . '%');
                })
                ->paginate($this->pagination);
        }

        return view('livewire.admin.assign-subject.index', compact(['AssignSubjects', 'classes', 'subjects']));
    }
}
