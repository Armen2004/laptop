<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

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
        'name',
        'slug',
        'description',
        'image',
        'status'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
