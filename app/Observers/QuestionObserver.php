<?php

namespace App\Observers;

use App\Models\Question;
use App\Models\User;
use App\Notifications\DataChangeEmailNotification;
use Notification;

class QuestionObserver
{
    public function created(Question $question): void
    {
        $payload = [
            'action' => 'created',
            'model'  => sprintf('%s#%s', get_class($question), $question->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function updated(Question $question): void
    {
        $payload = [
            'action' => 'updated',
            'model'  => sprintf('%s#%s', get_class($question), $question->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function deleted(Question $question): void
    {
        $payload = [
            'action' => 'deleted',
            'model'  => sprintf('%s#%s', get_class($question), $question->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }
}
