<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

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
        'title',
        'slug',
        'description',
        'image'
    ];
    
    public function delete()
    {
        \File::delete($this->image);
        parent::delete();
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
