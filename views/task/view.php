<?php

use yii\helpers\Html;
use yii\i18n\Formatter;
use yii\widgets\DetailView;
use kartik\editors\Summernote;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $modelComment app\models\Comment */
/* @var $comments app\models\Comment[] */

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
            'title',
            [
                'attribute' => 'description',
                'format' => 'raw',
            ],
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

<?php if ($modelComment->hasErrors()): ?>
    <div class="alert alert-danger">
        <?php foreach ($modelComment->getErrors() as $attribute => $errors): ?>
            <?php foreach ($errors as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="mb-3">
<?php
use yii\widgets\ActiveForm;
$form = ActiveForm::begin();
?><div class="form-group"><?php
echo $form->field($modelComment, 'comment')->widget(Summernote::class, [
    'useKrajeePresets' => true,
    // other widget settings
]);
echo Html::submitButton('Отправить', ['class' => 'btn btn-success']);
?></div><?php
ActiveForm::end();
?>
</div>

<?php foreach ($comments as $comment) : ?>
    <div class="comment">
        <p><?= $comment->comment ?></p>
        <p class="author"><b>Автор:</b> <?= $comment->creator->username ?></p>
    </div>
<?php endforeach; ?>
