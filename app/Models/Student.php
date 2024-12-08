<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Specify the table name if it's not the default (Laravel will use plural form by default)
    protected $table = 'students';

    // Define which attributes are mass assignable
    protected $fillable = [
        'dim_id',
        'user_id',
        'username',
        'password',
        'role',
        'nim',
        'name',
        'email',
        'prodi_id',
        'prodi_name',
        'fakultas',
        'angkatan',
        'status',
        'asrama',
    ];

    // You can add relationships, accessors, or mutators here if needed
}
