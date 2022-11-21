<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Classes extends Model
{
    use HasFactory;
    use Searchable;

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

    public function students()
    {
        return $this->belongsToMany(User::class, 'class_student', 'class_id', 'student_id');
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
        return $array;
    }
}
