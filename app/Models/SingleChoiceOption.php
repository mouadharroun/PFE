<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleChoiceOption extends Model
{
    use HasFactory;
    protected $primaryKey = 'option_id';

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'question_id');
    }
}
