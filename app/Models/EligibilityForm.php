<?php

// app/Models/EligibilityForm.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EligibilityForm extends Model
{
    use HasFactory;

    // Specify the fillable attributes for mass assignment
    protected $fillable = [
        'user_id',
        'eligibility_criteria',
        'status',
    ];

    // Cast the eligibility criteria as an array for easy handling
    protected $casts = [
        'eligibility_criteria' => 'array',  // This will automatically handle JSON conversion
    ];
}

