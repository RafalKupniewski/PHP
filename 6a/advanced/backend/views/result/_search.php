<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SearchResult */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="result-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_result') ?>

    <?= $form->field($model, 'score') ?>

    <?= $form->field($model, 'privilege') ?>

    <?= $form->field($model, 'id_login') ?>

    <?= $form->field($model, 'id_subject') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
