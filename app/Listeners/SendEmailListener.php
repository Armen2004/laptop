<?php

namespace App\Listeners;

use App\User;
use App\Events\SendEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendEmail $event
     * @return void
     */
    public function handle(SendEmail $event)
    {
        foreach($event->_users as $user)
            $this->sendEmail($user, $event->_model);
    }

    private function sendEmail(User $user, $model)
    {
        Mail::send('admin.notifications._email', ['user' => $user, 'model' => $model], function ($message) use ($user, $model) {
            $message->from(env('MAIL_USERNAME'), $model->title);
            $message->to($user->email)->subject($model->title);
        });
    }
}
