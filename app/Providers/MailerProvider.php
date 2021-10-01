<?php

namespace App\Providers;

/**
 * Interface to class send message 
 */

interface MailerProvider 
{
    public function send(String $email,String $message);
}
