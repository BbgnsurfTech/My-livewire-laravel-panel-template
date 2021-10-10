<?php

namespace App\Observers;

use App\Models\Team;
use App\Models\User;
use App\Notifications\DataChangeEmailNotification;
use Notification;

class TeamObserver
{
    public function created(Team $team): void
    {
        $payload = [
            'action' => 'created',
            'model'  => sprintf('%s#%s', get_class($team), $team->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }
}
