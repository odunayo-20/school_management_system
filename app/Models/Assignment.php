<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public $guarded = [];

    public function class(){
        return $this->belongsTo(Classes::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function staff(){
        return $this->belongsTo(Staff::class);
    }
}
