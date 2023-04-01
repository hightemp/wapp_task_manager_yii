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

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'username',
        'email',
        [
            'attribute' => 'created_at',
            'value' => $formatter->asDatetime($model->created_at),
        ],
        [
            'attribute' => 'updated_at',
            'value' => $formatter->asDatetime($model->updated_at),
        ],
    ],
]) ?>

