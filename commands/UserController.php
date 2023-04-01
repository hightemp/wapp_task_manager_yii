<?php

namespace app\commands;

use yii\console\Controller;
use app\models\User;

class UserController extends Controller
{
    /**
     * Создание нового пользователя.
     * @param string $username имя пользователя
     * @param string $email адрес электронной почты
     * @param string $password пароль
     */
    public function actionCreate($username, $email, $password)
    {
        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->password = $password;
        $user->auth_key = "";
        // \Yii::$app->security->generatePasswordHash(

        if ($user->save()) {
            echo "Пользователь успешно создан.\n";
        } else {
            echo "Ошибка при создании пользователя:\n";
            foreach ($user->getErrors() as $attribute => $errors) {
                foreach ($errors as $error) {
                    echo " - $attribute: $error\n";
                }
            }
        }
    }
}