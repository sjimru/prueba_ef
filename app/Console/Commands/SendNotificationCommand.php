<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Providers\NotificationService;
use App\Providers\SesProvider;
use App\Models\User;

class SendNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SendNotificationCommand {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mensage to user (parameter user id)';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $notification = new NotificationService(new SesProvider());
        $user = new User($this->argument('id'));

        $message = "Notificación a " . $user->getName();
        $resNotify = $notification->notify($user,$message) ? 'true' : 'false'; 
        
        $this->info(
            "
            id: " . $user->getId() . "
            email: " . $user->getEmail() . "
            message: $message
            result: $resNotify
            "
        );
    }
}
