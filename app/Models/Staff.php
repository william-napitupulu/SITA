<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    // Specify the table name (optional if Laravel's naming convention matches)
    protected $table = 'staff';

    // Define which fields are mass assignable
    protected $fillable = [
        'name',
        'group',
        'position',
        'photo',
    ];
}
