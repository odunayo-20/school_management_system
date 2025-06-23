<?php

namespace App\Livewire\Admin\Admission;

use Livewire\Component;
use App\Models\Admission;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;
    #[Url(history: true)]
    public $search = '';
    public $pagination = 10;
    public $admission_id;



    public function updatedSearch()
    {
        $this->resetPage();
    }




    public function delete($admission_id)
    {

        $this->admission_id = $admission_id;
    }

    public function destroy()
    {
        $admission =  Admission::findOrFail($this->admission_id);
        $admission->delete();
        if (Storage::disk('local')->exists($admission->image)) {
            Storage::delete($admission->image);
            $admission->delete();
        }
        $this->dispatch('close-modal');
        session()->flash('success', 'Admission is Successfully Deleted');
    }



    public function render()
    {
        if (!$this->search) {

            $admissions = Admission::latest()->paginate($this->pagination);
        } else {

            $admissions = Admission::latest()->where('surname', 'like', '%' . $this->search . '%')->orwhere('email', 'like', '%' . $this->search . '%')->orwhere('othername', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        }

        return view('livewire.admin.admission.index', compact('admissions'));
    }
}
