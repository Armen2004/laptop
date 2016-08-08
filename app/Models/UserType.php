<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_types';

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
    protected $fillable = ['name', 'price', 'duration'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
