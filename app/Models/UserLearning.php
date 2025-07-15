<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLearning extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
