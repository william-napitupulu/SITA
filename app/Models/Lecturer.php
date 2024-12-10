<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    // Specify the table name if it's not the default (Laravel uses plural form by default)
    protected $table = 'lecturers';

    // Define which attributes are mass assignable
    protected $fillable = [
        'pegawai_id',
        'dosen_id',
        'nip',
        'username',
        'password',
        'role',
        'nama',
        'email',
        'prodi_id',
        'prodi',
        'jabatan_akademik',
        'jabatan_akademik_desc',
        'jenjang_pendidikan',
        'nidn',
        'user_id',
    ];

    // You can add relationships, accessors, or mutators here if needed
}
