<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'auto_id') ?>

    <?= $form->field($model, 'marka') ?>

    <?= $form->field($model, 'model') ?>

    <div class="form-group">
        <?= Html::submitButton('Szukaj', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Rezygnuj', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
