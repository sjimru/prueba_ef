<?php

namespace App\Providers;

use App\Providers\MailerProvider;

class SmtpProvider implements MailerProvider
{

    /**
     * Send message
     * 
     * @return boolean
     */
    public function send(String $email,String $message){

        return (isset($email) && isset($message)) ? true : false;
    }

    
}
