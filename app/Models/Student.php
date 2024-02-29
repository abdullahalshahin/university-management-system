<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable {
    use HasFactory;

    protected $guarded = [];

    public function department() {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}
