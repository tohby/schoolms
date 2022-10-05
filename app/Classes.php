<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'classId', 'teacherId', 'courseId'
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacherId');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class, 'courseId');
    }
}
