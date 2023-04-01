<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use Yii;
use Faker\Factory;
use app\lib\factories\UserFactory;
use app\lib\factories\TaskFactory;

class SeedController extends Controller
{
    public function actionGenerate()
    {
        $faker = Factory::create();

        /*
        for ($i = 1; $i <= 20; $i++) {
            $username = $faker->username;
            $email = $faker->email;
            UserFactory::createUser(
                $username,
                $email,
                '123456'
            );
        }
        */

        for ($i = 1; $i <= 10; $i++) {
            $username = $faker->username;
            $email = $faker->email;
            $user = UserFactory::createUser(
                $username,
                $email,
                '123456'
            );
            TaskFactory::createTask(
                $faker->sentence,
                $user,
                $faker->text,
                $faker->realText
            );
        }

        return ExitCode::OK;
    }
}
