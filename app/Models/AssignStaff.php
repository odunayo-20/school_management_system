<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignStaff extends Model
{
    public $guarded = [];

    public function staff(){
        return $this->belongsTo(Staff::class);
     }
     public function class(){
        return $this->belongsTo(Classes::class);
     }
}
