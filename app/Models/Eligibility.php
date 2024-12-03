<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eligibility extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'is_eligible'];

    // Optional: Add any relationships if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

