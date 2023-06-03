<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleChoiceOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_id',
        'option_text',
        'is_correct',
        // Other option properties if any
    ];
    
    protected $primaryKey = 'option_id';

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
    
}
