<?php

namespace App\GraphQL\Queries;

use App\Models\Notification;

final class Notifications
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $notifications = Notification::where("user_id", $args["userId"])->get();
        return $notifications;
    }
}
