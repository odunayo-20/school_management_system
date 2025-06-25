<?php

namespace App\Livewire\Staff\Assignment;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AssignmentSubmit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Submit extends Component
{

    use WithPagination;



    public function deleteAssignmentSubmit(AssignmentSubmit $assignments)
    {
        $assignments->delete();
        Storage::delete($assignments->document);
        $assignments->delete();
        session()->flash('success', 'Assignment Submission is Successfully Delected');

        return redirect(route('staff_assignment_submit'));
    }

    public function downloadfile(AssignmentSubmit $assignment)
    {
        if (Storage::disk('local')->exists($assignment->document)) {
            session()->flash('success', 'File Downloading');

            return Storage::download($assignment->document, $assignment->subject->name);
        } else {
            session()->flash('success', 'File Not Found');

        }
    }

    public function render()
    {
        $staff_id = Auth::guard('staff')->user()->id;

        $assignments = AssignmentSubmit::where('staff_id', $staff_id)->with(['class', 'subject', 'staff', 'student'])->paginate(10);
        return view('livewire.staff.assignment.submit', compact('assignments'));
    }
}
