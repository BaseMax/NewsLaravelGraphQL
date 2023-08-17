<?php

namespace App\GraphQL\Queries;
use App\Models\Subscription;

final class UserSubscriptions
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $subscriptions = Subscription::where("user_id", $args["userId"])->get();
        return $subscriptions;
    }
}
