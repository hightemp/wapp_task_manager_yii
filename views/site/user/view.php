<?php

/** @var yii\web\View $this */
/** @var \app\models\User $model */
/** @var yii\data\ActiveDataProvider $usersDataProvider */

use yii\grid\GridView;
use yii\i18n\Formatter;
use yii\helpers\Html;

$formatter = new Formatter();
$formatter->datetimeFormat = 'php:d.m.Y H:i:s';

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['site/users'] ];
$this->params['breadcrumbs'][] = $model->username;
?>

<table>
    <tr>
        <td><b>Логин:</b></td>
        <td><?php echo $model->username ?></td>
    </tr>
    <tr>
        <td><b>Email:</b></td>
        <td><?php echo $model->email ?></td>
    </tr>
    <tr>
        <td><b>Создан:</b></td>
        <td><?php echo  $formatter->asDatetime($model->created_at) ?></td>
    </tr>
</table>

