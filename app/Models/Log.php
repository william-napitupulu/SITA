<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['message'];

    // Enable timestamps management
    public $timestamps = true;

    // Specify that there is no 'updated_at' column
    const UPDATED_AT = null;
}
