<?php

namespace App\Providers;

use App\Providers\MailerProvider;


class SesProvider implements MailerProvider
{

    /**
     * Send message
     * 
     * @return boolean
     */
    public function send($email, $message)
    {

        return (isset($email) && isset($message)) ? true : false;
    }

}
