<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HubungiKamiInfo extends Model
{
    use HasFactory;

    protected $table = 'hubungi_kami_infos';
    protected $fillable = ['content'];

    public $timestamps = true;
}
