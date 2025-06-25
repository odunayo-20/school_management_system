<?php

namespace App\Livewire\Staff\Assignment;

use Livewire\Component;
use App\Models\Assignment;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class Index extends Component
{

    use WithPagination;

    public $document;

    public $time;

    public $assign;
    public $assignment_id;



    // public function downloadfile(Assignment $assign)
    // {
    //     if (Storage::disk('local')->exists($assign->document)) {
    //         session()->flash('success', 'File downloading');

    //         return Storage::download($assign->document, $assign->subject->name);
    //     }
    //     session()->flash('error', 'File Not Found');
    // }

    public function downloadfile(Assignment $assign): StreamedResponse
    {
        $filePath = $assign->document; // e.g. 'assignments/file.pdf'

        // Use 'public' if the file was stored in storage/app/public
        if (Storage::disk('public')->exists($filePath)) {
            session()->flash('success', 'File downloading...');
            $filename = $assign->subject->name . '.' . pathinfo($filePath, PATHINFO_EXTENSION);

            return Storage::disk('public')->download($filePath, $filename);
        }

        session()->flash('error', 'File not found.');
        return back();
    }


    public function delete($assignment_id){

        $this->assignment_id = $assignment_id;
    }

    public function destroy(){
        $assignment =  Assignment::findOrFail($this->assignment_id);
        $assignment->delete();
        if(Storage::disk('local')->exists($assignment->document)){
            Storage::delete($assignment->document);
            $assignment->delete();
        }
        session()->flash('success', 'Assignment is Successfully Deleted');
        $this->dispatch('close-modal');
    }

    public function render()
    {
        $staff_id = Auth::guard('staff')->user()->id;
        $assignments = Assignment::where('staff_id', $staff_id)->with(['class', 'staff', 'subject'])->paginate(10);
        return view('livewire.staff.assignment.index', compact('assignments'));
    }
}
