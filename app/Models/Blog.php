<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blogs';

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
        'short_description',
        'description',
        'image'
    ];
    
    public function delete()
    {
        $destinationPath = base_path('img/blog/'.$this->image);
        if (!\File::exists($destinationPath)) {
            \File::delete($destinationPath);
        }
        return parent::delete();
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
