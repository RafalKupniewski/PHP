<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WyjazdySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wyjazdy-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pw_id') ?>

    <?= $form->field($model, 'data') ?>

    <div class="form-group">
        <?= Html::submitButton('Szukaj', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Rezygnuj', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
