<?php

namespace App;

use Carbon\Carbon;
use App\Models\Lesson;
use App\Models\UserType;
use App\Models\ForumPost;
use App\Models\ForumTopic;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'user_type_id', 'last_activity'
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
    protected $dates = ['deleted_at', 'last_activity'];

    /**
     * Set the user's password.
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
        return $query->findOrFail(Auth::guard('user')->id())->update([
            'last_activity' => Carbon::now()
        ]);
    }

    /**
     * Get the user's last logged in.
     *
     * @param  string $value
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->toDayDateTimeString();
    }

    public function userType()
    {
        return $this->belongsTo(UserType::class);
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
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
