<?php

namespace App\Livewire\Staff\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $showPassword = false;
    public $email, $password;

    public function togglePasswordVisibility()
    {
        $this->showPassword = !$this->showPassword;
    }
    public function store()
    {
        $validated = $this->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('staff')->attempt($validated)) {
            session()->flash('success', 'Login Successfully');
            return redirect(route('staff_dashboard'));
        } else {
            session()->flash('error', 'Invalid Credentials');
        }
    }




    public function render()
    {
        return view('livewire.staff.auth.login');
    }
}
