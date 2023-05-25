<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    use HasFactory;
    public function exam() {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    public function question() {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function student() {
        return $this->belongsTo(User::class, 'student_id');
    }
}
