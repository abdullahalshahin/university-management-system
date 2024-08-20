<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerPaper extends Model {
    use HasFactory;

    protected $guarded = [];

    public function question() {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
