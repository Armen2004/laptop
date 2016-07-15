<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'forum_categories';

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
    protected $fillable = ['name', 'slug', 'description'];

    public function forumTopics()
    {
        return $this->hasMany(ForumTopic::class);
    }
}
