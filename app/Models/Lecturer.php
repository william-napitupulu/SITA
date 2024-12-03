<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isCoordinator()
    {
        return $this->role === 'coordinator';
    }
}
