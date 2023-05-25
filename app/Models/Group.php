<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    
    public function users() {
        return $this->belongsToMany(User::class, 'user_groups', 'group_id', 'user_id');
    }

    public function courses() {
        return $this->hasMany(Course::class, 'group_id');
    }
}
