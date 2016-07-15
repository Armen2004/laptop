<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'forum_posts';

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
    protected $fillable = ['forum_topic_id', 'user_id', 'parent_id', 'comment', 'like'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }

    public function forumTopic()
    {
        return $this->belongsTo(ForumTopic::class);
    }
}
