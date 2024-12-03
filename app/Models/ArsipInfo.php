<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipInfo extends Model
{
    use HasFactory;
    protected $table = 'arsip_infos';
    protected $fillable = ['arsip_info'];
}
