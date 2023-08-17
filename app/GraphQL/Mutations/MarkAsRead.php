<?php

namespace App\GraphQL\Mutations;

use App\Models\Notification;

final class MarkAsRead
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $notification = Notification::find($args["notificationId"]);
        $notification->isRead = true;
        $notification->save();
        return $notification;
    }
}
