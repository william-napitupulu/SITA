<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    // Specify the table name (optional, if Laravel's naming convention is followed)
    protected $table = 'alumni';

    // Define fillable fields for mass assignment
    protected $fillable = [
        'photo',
        'nama',
        'tahun_lulus',
        'jurusan',
        'testimonial',
    ];
}
