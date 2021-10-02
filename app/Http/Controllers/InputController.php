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
     */
    public function sendNotification($id)
    {

        $user = new User($id);

        $message = "Notificación a ". $user->getName();

        $result = $this->service->notify($user, $message);

        return Response()->json([
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'message' => $message,
            'result' => $result,
        ]);
        
    }
}
