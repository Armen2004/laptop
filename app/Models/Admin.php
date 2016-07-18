<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class Admin extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'email', 'password', 'last_activity'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['last_activity'];

    /**
     * Set the admins's password.
     *
     * @param  string $value
     * @return string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function scopeUpdateActivity($query)
    {
        return $query->findOrFail(Auth::guard('admin')->id())->update([
            'last_activity' => Carbon::now()
        ]);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function forumTopics()
    {
        return $this->hasMany(ForumTopic::class, 'user_id');
    }

    public function forumPosts()
    {
        return $this->hasMany(ForumPost::class, 'user_id');
    }
}