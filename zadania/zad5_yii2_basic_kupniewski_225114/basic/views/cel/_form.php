<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'miasto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Utwórz' : 'Zapisz', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
