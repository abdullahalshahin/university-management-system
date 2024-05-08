<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semester extends Model {
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function semester_courses() {
        return $this->hasMany(SemesterCourse::class, 'semester_id', 'id');
    }
}
