<?php

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $usersDataProvider */

use yii\grid\GridView;
use yii\i18n\Formatter;
use yii\helpers\Html;
use yii\bootstrap5\LinkPager;

$formatter = new Formatter();
$formatter->datetimeFormat = 'php:d.m.Y H:i:s';

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;

echo GridView::widget([
    'dataProvider' => $usersDataProvider,
    'columns' => [
        [
            'attribute' => 'id',
            'header' => 'ID',
        ],
        [
            'attribute' => 'username',
            'header' => 'Имя пользователя',
        ],
        [
            'attribute' => 'email',
            'header' => 'Email',
        ],
        [
            'attribute' => 'created_at',
            'header' => 'Дата создания',
            'value' => function ($model) use ($formatter) {
                return $formatter->asDatetime($model->created_at);
            },
        ],
        [
            'attribute' => 'updated_at',
            'header' => 'Дата обновления',
            'value' => function ($model) use ($formatter) {
                return $formatter->asDatetime($model->created_at);
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
            'buttons' => [
                'view' => function ($url, $model) {
                    return Html::a('<i class="bi bi-eye-fill"></i>', ['user/view', 'id' => $model->id], ['class' => 'btn btn-light']);
                }
            ],
        ],
    ],
    'summary' => "Показано {begin}-{end} из {totalCount} записей",
    'pager' => [
        'class' => LinkPager::class,
        'options' => [
            'class' => 'pagination justify-content-center'
        ],
    ],
]);