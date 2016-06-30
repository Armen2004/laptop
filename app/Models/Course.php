<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{

    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';

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
        'admin_id',
        'course_type_id',
        'name',
        'slug',
        'description',
        'image',
        'status',
        'price'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function delete()
    {
        \File::delete($this->image);
        parent::delete();
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function courseType()
    {
        return $this->belongsTo(CourseType::class);
    }
}