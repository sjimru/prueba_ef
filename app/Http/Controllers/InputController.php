<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\NotificationService;
use App\Providers\SmtpProvider;
use App\Models\User;

class InputController extends Controller
{
    private $service;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->service = new NotificationService(new SmtpProvider());
    }

    /**
     * Send notification to user
     * 
     * @return JSON
     * 
     * structure JSON
     * id: id user 
     * email: email user 
     * message: text send message 
     * result: send result 
     */
    public function sendNotification($id)
    {

        $user = new User($id);

        $message = "Notificación a ". $user->getName();
        
        return $this->service->notify($user, $message);
        
    }
}
