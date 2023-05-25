<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    
    public function course() {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function questions() {
        return $this->hasMany(Question::class, 'exam_id');
    }
}
