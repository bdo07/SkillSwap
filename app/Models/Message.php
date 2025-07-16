<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['user_id', 'match_id', 'content'];

    public function match()
    {
        return $this->belongsTo(UserMatch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
