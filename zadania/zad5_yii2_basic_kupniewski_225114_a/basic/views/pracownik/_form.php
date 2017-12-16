<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Auto;

/* @var $this yii\web\View */
/* @var $model app\models\Pracownik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pracownik-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'imie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nazwisko')->textInput(['maxlength' => true]) ?>

    <!--?= $form->field($model, 'auto_id')->textInput() ?-->

    <?= $form->field($model, 'auto_id')->dropDownList(ArrayHelper::map(Auto::find()
        ->all(),'auto_id','model','marka') ,['auto_id' => [$_GET['auto_id'] => ['Model'=>'model']]]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Dodaj' : 'Zapisz', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
