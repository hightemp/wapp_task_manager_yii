<?php

use yii\helpers\Html;
use yii\i18n\Formatter;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$formatter = new Formatter();
$formatter->datetimeFormat = 'php:d.m.Y H:i:s';

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Задачи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы точно хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            [
                'attribute' => 'creator.username',
                'label' => 'Creator',
            ],
            [
                'attribute' => 'created_at',
                'value' => $formatter->asDatetime($model->created_at),
            ],
            [
                'attribute' => 'updated_at',
                'value' => $formatter->asDatetime($model->updated_at),
            ],
            'status',
        ],
    ]) ?>

</div>