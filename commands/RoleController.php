<?php

namespace app\commands;

use Yii;
use yii\console\Controller;

class RoleController extends Controller
{
    public function actionIndex()
    {
        $authManager = Yii::$app->authManager;

        // Создание ролей
        $guestRole = $authManager->createRole('guest');
        $authManager->add($guestRole);

        $userRole = $authManager->createRole('user');
        $authManager->add($userRole);

        $adminRole = $authManager->createRole('admin');
        $authManager->add($adminRole);

        // Создание разрешений
        $canAdminPermission = $authManager->createPermission('canAdmin');
        $authManager->add($canAdminPermission);

        // Назначение ролей и разрешений
        // $authManager->addChild($adminRole, $userRole);
        // $authManager->addChild($userRole, $guestRole);
        $authManager->addChild($adminRole, $canAdminPermission);

        echo "Roles and permissions created successfully.\n";
    }
}