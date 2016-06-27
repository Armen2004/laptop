<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'course_types';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
