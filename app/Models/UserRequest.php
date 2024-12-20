<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'criteria', 'status', 'review_comments'];

    protected $casts = [
        'criteria' => 'array', // Automatically handle JSON fields
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
