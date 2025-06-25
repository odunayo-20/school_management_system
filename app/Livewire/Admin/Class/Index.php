<?php

namespace App\Livewire\Admin\Class;

use App\Models\Classes;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;

class Index extends Component
{
    #[Url(history: true)]
    public $search = '';
    public $pagination = 10;
    public $class_id;
    public $name, $class, $status;



    public function storeClass()
    {
        $this->validate([
            'name' => 'required|string',
            // 'slug' => 'required|string',
        ]);

        Classes::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'status' => $this->status == true ? '1' : '0',
        ]);

        session()->flash('success', 'Class Successfully Created');
        $this->reset();

        $this->dispatch('close-modal');
    }

    public function editClass(Classes $class)
    {

        $this->class = $class;
        $this->name = $class->name;
        $this->status = $class->status == '1' ? true : false;
    }



    public function updateClass()
    {
        $this->validate([
            'name' => 'required|string',
            // 'slug' => 'required|string',
        ]);

        $this->class->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'status' => $this->status == true ? '1' : '0',

        ]);
        session()->flash('success', value: 'Class Successfully Updated');
        $this->reset();
        $this->dispatch('close-modal');
    }

    public function deleteClass($class)
    {
        // dd($class);
        $this->class = $class;
    }
    public function destroyClass()
    {
        Classes::findOrFail($this->class)->delete();
        session()->flash('success', 'Class Successfully Deleted');
        $this->reset();
        $this->dispatch('close-modal');
    }

    public function updateStatus($classId, $newStatus)
    {
        $classes = Classes::find($classId);
        $classes->update(['status' => $newStatus]);
    }


    public function render()
    {
        if (!$this->search) {

            $classes = Classes::latest()->paginate($this->pagination);
        } else {

            $classes = Classes::latest()->where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        }
        return view('livewire.admin.class.index', compact('classes'));
    }
}
