<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class ChangePassword
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = User::find($args["userId"]);
        $user->password = Hash::make($args["password"]);
        $user->save();
        return $user;
    }
}
