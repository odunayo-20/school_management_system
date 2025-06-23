<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\Gallery;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

    #[Rule('required')]
    public $category;

    #[Rule(['images.*' => 'required'])]
    public $images;

    public $image;


    public function store()
    {
        $this->validate();

        if (is_array($this->images)) {
            foreach ($this->images as $image) {
                $result = $image->store('gallery', 'public');
                Gallery::create([
                    'category' => $this->category,
                    'slug' => Str::slug($this->category),
                    'image' => $result,
                ]);
            }
        }
        $this->reset();
        session()->flash('success', 'Gallery Successfully Created');
        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'Gallery Successfully Created!',
            'icon' => 'success',
        ]);

        return redirect(route('admin_gallery'));
    }


    public function render()
    {
        return view('livewire.admin.gallery.create');
    }
}
