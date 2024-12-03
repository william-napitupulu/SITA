<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    // Specify the table name (optional if the table name matches the model name convention)
    protected $table = 'prestasi';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'cover',
        'judul',
        'tahun_perolehan',
        'deskripsi',
    ];
}
