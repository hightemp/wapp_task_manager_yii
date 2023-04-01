<?php

use app\models\User;

namespace \lib\fabrics;

class UserFabric
{
    public static function createUser($username, $email, $password) {
        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->setPassword($password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}