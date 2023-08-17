<?php

namespace App\GraphQL\Mutations;

use App\Models\Notification;

final class MarkAllAsRead
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $notifications = Notification::where("user_id", $args["userId"])->get();
        foreach($notifications as $notification){
            $notification->isRead = true;
            $notification->save();
        }
        return $notifications;
    }
}
