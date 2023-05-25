<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function group() {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function teacher() {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function exams() {
        return $this->hasMany(Exam::class, 'course_id');
    }
}
