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
