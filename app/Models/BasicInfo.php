<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasicInfo extends Model
{
    // Specify the table name (if not the plural of the model name)
    protected $table = 'basic_infos';

    // Define which fields can be mass assigned (for creating or updating records)
    protected $fillable = [
        'sejarah',
        'visi',
        'misi',
        'struktur_organisasi',
        'program_sekolah',
    ];
}
