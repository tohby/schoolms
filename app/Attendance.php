<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'student_id', 'status', 'class_id'
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
