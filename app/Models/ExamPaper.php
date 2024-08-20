<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamPaper extends Model {
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    function course() {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    function assigned_question() {
        return $this->hasMany(ExamPaperAssignedQuestion::class, 'exam_paper_id', 'id');
    }

    function exam_paper_assigned_questions() {
        return $this->hasManyThrough(Question::class, ExamPaperAssignedQuestion::class, 'exam_paper_id', 'id', 'id', 'question_id');
    }

    function exam_participants() {
        return $this->hasMany(ExamParticipant::class, 'exam_paper_id', 'id');
    }
}
