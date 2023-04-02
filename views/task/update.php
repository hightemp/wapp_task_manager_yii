<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Url;
use yii\web\JsExpression;
use kartik\editors\Summernote;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $userOptions string[] */

$this->title = 'Редактирование: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Задачи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="task-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="task-form">

        <?php $form = ActiveForm::begin(); ?>

        <div class="mb-3">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="mb-3">
        <?= $form->field($model, 'short_description')->widget(Summernote::class, [
            'useKrajeePresets' => true,
            // other widget settings
        ]); ?>
        </div>

        <div class="mb-3">
        <?= $form->field($model, 'description')->widget(Summernote::class, [
            'useKrajeePresets' => true,
            // other widget settings
        ]); ?>
        </div>

        <div class="mb-3">
        <?= $form->field($model, 'creator_id')->widget(Select2::class, [
            'data' => $userOptions,
            'options' => ['placeholder' => 'Выберите пользователя'],
            'pluginOptions' => [
                'allowClear' => true,
                'minimumInputLength' => 0,
                'ajax' => [
                    'url' => Url::to(['user/load-data']),
                    'dataType' => 'json',
                    'delay' => 250,
                    'data' => new JsExpression('function(params) {
                return {
                    q: params.term,
                };
            }'),
                    'processResults' => new JsExpression('function(data) {
                return {
                    results: data.results,
                };
            }'),
                    'cache' => true,
                ],
            ],
        ]); ?>
        </div>

        <div class="mb-3">
        <?= $form->field($model, 'status')->dropDownList([
                'new' => 'Новая',
                'in_progress' => 'В работе',
                'completed' => 'Завершена',
            ], ['prompt' => '']) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Назад', ['index'], ['class' => 'btn btn-secondary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>