<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SemesterCourseParticipant extends Model {
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function course() {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    
    public function semester() {
        return $this->belongsTo(Semester::class, 'semester_id', 'id');
    }
    
    public function student() {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
