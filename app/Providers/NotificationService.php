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
     * @return boolean
     */
    public function notify(User $user, $message)
    {

        return $this->app->send($user->getEmail(), $message);
    }
}
