<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ForumTopic extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'forum_topics';

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
        'forum_category_id', 'title', 'slug', 'user_id', 'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }

    public function forumCategory()
    {
        return $this->belongsTo(ForumCategory::class);
    }

    public function forumPosts()
    {
        return $this->hasMany(ForumPost::class);
    }

}
