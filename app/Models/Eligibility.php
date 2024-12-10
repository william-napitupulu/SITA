<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eligibility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_number',
        'email',
        'date_of_birth',
        'phone_number',
        'eligibility_status',
        'comments',
        'criteria', // This will store the criteria as a JSON field
    ];
}

