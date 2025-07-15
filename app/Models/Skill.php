<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_skills');
    }

    public function learners()
    {
        return $this->belongsToMany(User::class, 'user_learnings');
    }
}
