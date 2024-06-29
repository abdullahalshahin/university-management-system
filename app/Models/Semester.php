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

    public function students() {
        return $this->hasManyThrough(
            Student::class,
            SemesterCourseParticipant::class,
            'semester_course_id',
            'id', 
            'id', 
            'student_id'
        )->join('semester_courses', 'semester_courses.id', '=', 'semester_course_participants.semester_course_id')
            ->where('semester_courses.semester_id', $this->id);
    }
}
