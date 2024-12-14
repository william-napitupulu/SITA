<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovedStudent extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'supervisor_id', 'name' ,'batch', 'nim', 'group'];

    // Relationship to fetch the student details
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    // Relationship to fetch the supervisor details
    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }
}
