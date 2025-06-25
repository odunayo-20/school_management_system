<?php

namespace App\Livewire\Admin\AssignStaff;

use App\Models\Staff;
use App\Models\Classes;
use Livewire\Component;
use App\Models\AssignStaff;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Index extends Component
{

    #[Url(history:true)]
    public $staff, $AssignStaff;
    public $class,$status;
    public $search = '';
    public $pagination = 10;
    public $assignStaff_id;
    use WithPagination;

    public function storeAssignStaff()
    {
        $this->validate([
            'class' => 'required|string',
            'staff' => 'required|string',
        ]);

        AssignStaff::create([
            'class_id' => $this->class,
            'staff_id' => $this->staff,
            'status' => $this->status == true ? '1' : '0',
        ]);

        session()->flash('success', 'Assign Subject Successfully Created');
        $this->reset();

        $this->dispatch('close-modal');
    }

    public function editAssignStaff(AssignStaff $AssignStaff)
    {

        $this->AssignStaff = $AssignStaff;
        $this->staff = $AssignStaff->staff_id;
        $this->class = $AssignStaff->class_id;
        $this->status = $AssignStaff->status == '1' ? true : false;
    }



    public function updateAssignStaff()
    {

        $this->AssignStaff->update([
            'class_id' => $this->class,
            'staff_id' => $this->staff,
            'status' => $this->status == true ? '1' : '0',

        ]);
        session()->flash('success', value: 'Assign Staff Successfully Updated');
        $this->reset();
        $this->dispatch('close-modal');
    }

    public function deleteAssignStaff($AssignStaff)
    {
        // dd($AssignStaff);
        $this->AssignStaff = $AssignStaff;
    }
    public function destroyAssignStaff()
    {
        AssignStaff::findOrFail($this->AssignStaff)->delete();
        session()->flash('success', 'Assign Subject Successfully Deleted');
        $this->reset();
        $this->dispatch('close-modal');
    }

    public function updateStatus($AssignStaffId, $newStatus)
    {
        $AssignStaff = AssignStaff::find($AssignStaffId);
        $AssignStaff->update(['status' => $newStatus]);
    }


    public function render()
    {
        $classes = Classes::where('status', 0)->get();
        $staffs= Staff::get();

        if (!$this->search) {
            $AssignStaffs = AssignStaff::latest()
                ->with(['class', 'staff'])
                ->paginate($this->pagination);
        } else {
            $AssignStaffs = AssignStaff::latest()
                ->with(['class', 'staff'])
                ->whereHas('staff', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                        //   ->orWhere('slug', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('class', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                          ->orWhere('slug', 'like', '%' . $this->search . '%');
                })
                ->paginate($this->pagination);
        }

        return view('livewire.admin.assign-staff.index', compact(['AssignStaffs', 'classes', 'staffs']));
    }
}

    //
