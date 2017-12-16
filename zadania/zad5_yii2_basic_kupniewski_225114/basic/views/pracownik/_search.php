<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PracownikSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pracownik-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pracownik_id') ?>

    <?= $form->field($model, 'imie') ?>

    <?= $form->field($model, 'nazwisko') ?>

    <?= $form->field($model, 'auto_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Szukaj', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Rezygnuj', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
