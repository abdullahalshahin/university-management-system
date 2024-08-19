<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterCourse extends Model {
    use HasFactory;

    protected $guarded = [];

    public function semester() {
        return $this->belongsTo(Semester::class, 'semester_id', 'id');
    }

    public function course() {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function teacher() {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }

    public function semester_course_classes() {
        return $this->hasMany(SemesterCourseClass::class, 'semester_course_id', 'id');
    }
}
