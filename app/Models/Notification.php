<?php

namespace App\Models;

use App\Events\SendEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'custom_notifications';

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
    protected $fillable = ['title', 'custom_notification_content'];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            event(new SendEmail($model));
        });
    }
}
