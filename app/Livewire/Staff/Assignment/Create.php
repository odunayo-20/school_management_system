<?php

namespace App\Livewire\Staff\Assignment;

use App\Models\Classes;
use Livewire\Component;
use App\Models\Assignment;
use App\Models\AssignSubject;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{

    use WithFileUploads;
    public $AssignSubject;

    public $classes;

    public $selectedSubject = null;

    public $selectedClass = null;

    public $time, $date, $document, $status;


    public function mount()
    {
        $this->classes = Classes::get();
        $this->AssignSubject = collect();
        // dd($this);
    }

    public function updatedSelectedClass($class)
    {

        if (!is_null($class))
            $this->AssignSubject  = AssignSubject::with('subject')->where('class_id', $class)->get();
    }

    public function store()
    {
        $this->validate([
            'time' => 'required|string',
            'date' => 'required|string',
            'selectedSubject' => 'required|string',
            'selectedClass' => 'required|string',
            'document' => 'file|mimes:doc,docx,csv,xls,pdf,txt',
        ]);


        $file = $this->document;
        if ($this->document) {
            $file = $this->document->store('assignment', 'public');
        }
        $assignment = Assignment::create([
            'time' => $this->time,
            'date' => $this->date,
            'subject_id' => $this->selectedSubject,
            'class_id' => $this->selectedClass,
            'staff_id' => Auth::guard('staff')->user()->id,
            'document' => $file,
        ]);

        session()->flash('success', 'Assignment is Successfully Submitted');
        $this->reset();
        return redirect(route('staff_assignment'));
    }

        public function render()
        {
            return view('livewire.staff.assignment.create');
        }
}

