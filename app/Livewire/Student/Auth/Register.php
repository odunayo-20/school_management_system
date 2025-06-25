<?php

namespace App\Livewire\Student\Auth;

use App\Models\Classes;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{

    // public $class;
    use WithFileUploads;

    public $firstname;

    public $lastname;

    public $middlename;

    public $date_of_birth;

    public $address;

    public $state;

    public $lga;

    public $phone;

    public $class;
    public $town;


    public $password;
    public $confirm_password;

    public $gender;
    public $image;

    public $email;


    public function store()
    {
        $validated = $this->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'middlename' => 'required|string',
            'date_of_birth' => 'required|string',
            'address' => 'required|string',
            'state' => 'required|string',
            'gender' => 'required|string',
            'lga' => 'required|string',
            'phone' => 'required|numeric',
            'town' => 'required|string',
            // 'class' => 'required|string',
            'image' => 'required|mimes:jpg,png,jpeg',
            'email' => 'required|string|email|unique:staff',
            'password' => 'required|string',
            'confirm_password' => 'required|same:password',
        ]);

        // dd($validated);
        if ($this->image) {
            $image = $this->image->store('student', 'public');
        }
        $student = Student::create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'middlename' => $this->middlename,
            'dob' => $this->date_of_birth,
            'address' => $this->address,
            'state' => $this->state,
            'town' => $this->town,
            'gender' => $this->gender,
            'lga' => $this->lga,
            'phone' => $this->phone,
            'class' => "jss 1",
            'image' => $image,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        return redirect(route('student_login'));
    }



    public function render()
    {
        $classes = Classes::where('status', 'active')->orderBy('name')->get();
        return view('livewire.student.auth.register', compact('classes'));
    }
}
