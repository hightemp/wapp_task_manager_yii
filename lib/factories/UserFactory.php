<?php

namespace app\lib\factories;

use app\models\User;

class UserFactory
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