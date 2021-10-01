<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Providers\SmtpProvider;

class NotificationService extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MailerProvider::class, function($app){
            return new MailerProvider();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

        /**
     * Send notification
     * 
     * @return JSON
     * 
     * structure JSON
     * id: id user 
     * email: email user 
     * message: text send message 
     * result: send result 
     */
    public function notify(User $user, $message)
    {
        return Response()->json([
            'id' => $user->id,
            'email' => $user->email,
            'message' => $message,
            'result' => $this->app->send('$user->email', $message),
        ]);
    }
}
