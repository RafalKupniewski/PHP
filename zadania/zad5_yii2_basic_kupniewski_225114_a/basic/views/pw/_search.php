<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PwSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pw-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pw_id') ?>

    <?= $form->field($model, 'pracownik_id') ?>

    <?= $form->field($model, 'cel_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Szukaj', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Rezygnuj', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
