<?php

namespace App\Livewire\Admin\Student;

use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;
    #[Url(history: true)]
    public $search = '';
    public $pagination = 10;
    public $student_id;

    public function delete($student_id){

        $this->student_id = $student_id;
    }

    public function destroy(){
        $student =  Student::findOrFail($this->student_id);
        $student->delete();
        if(Storage::disk('local')->exists($student->image)){
            Storage::delete($student->image);
            $student->delete();
        }
        $this->dispatch('close-modal');
        session()->flash('success', 'student is Successfully Deleted');
    }

    public function render()
    {

        if (!$this->search) {

            $students = Student::latest()->paginate($this->pagination);
        } else {

            $students = Student::latest()->where('firstname', 'like', '%' . $this->search . '%')->orwhere('lastname', 'like', '%' . $this->search . '%')->orwhere('email', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        }
        return view('livewire.admin.student.index', compact('students'));
    }
}
