<?php

namespace App\Livewire\Student\Profile;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{

    use WithFileUploads;

    public $new_image;
    public $old_image;

    public $email;
    public $phone;
    public $middlename;

    public $firstname;
    public $lastname;

    public $student = [];

    public function mount()
    {
        $student = Student::findOrFail(Auth::guard('student')->user()->id);
        // $student = $student;
        $this->firstname =  $student->firstname;
        $this->lastname =  $student->lastname;
        $this->email =  $student->email;
        $this->phone =  $student->phone;
        $this->middlename =  $student->middlename;
        $this->old_image =  $student->image;
    }

    public function updateStudent()
    {
        $student = Student::findOrFail(Auth::guard('student')->user()->id);

        $student->lastname = $this->lastname;
        $student->firstname = $this->firstname;
        $student->middlename = $this->middlename;
        $student->email = $this->email;
        $student->phone = $this->phone;
        $student->save();
        session()->flash('success', 'Profile Successfully Updated');

        return redirect(route('student_profile'));
    }

    public function updateImage(){
        $student = Student::findOrFail(Auth::guard('student')->user()->id);

        $file = $this->new_image;
        if (!is_null($this->new_image)) {
            $file = $this->new_image->store('student', 'public');
        }


        $student->image = $file;
        $student->save();
        session()->flash('success', 'Profile Image Successfully Updated');

        return redirect(route('student_profile'));

    }



    public function render()
    {
        return view('livewire.student.profile.index');
    }
}
