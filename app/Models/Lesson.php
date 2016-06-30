<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lessons';

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
    protected $fillable = [
        'title',
        'slug',
        'video_length',
        'video',
        'admin_id',
        'course_id',
        'lesson_type_id',
        'price',
        'status',
        'description'
    ];

    public function delete()
    {
        \File::delete($this->video);
        parent::delete();
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lessonType()
    {
        return $this->belongsTo(LessonType::class);
    }
}
