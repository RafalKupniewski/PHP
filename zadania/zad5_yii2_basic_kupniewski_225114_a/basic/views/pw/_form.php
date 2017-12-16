<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Pracownik;
use app\models\Cel;
#use app\widgets\DatePicker;
#use app\widgets\InputWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Pw */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pw-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--?= $form->field($model, 'data')->textInput() ?-->

    <?= $form->field($model, 'data')->textInput(['maxlenght' => 255, 'value' => date( 'Y-m-d', strtotime( $model->data ) )]); ?>


    <!--?= $form->field($model, 'data')->widget(\yii\jui\DatePicker::classname(), [
    //'language' => 'ru',
    //'dateFormat' => 'yyyy-MM-dd',
]) ?-->

    <!--?= $form->field($model, 'pracownik_id')->textInput() ?-->

    <!--?= $form->field($model, 'cel_id')->textInput() ?-->

    <?= $form->field($model, 'pracownik_id')->dropDownList(ArrayHelper::map(Pracownik::find()
        ->all(),'pracownik_id','nazwisko','imie') ,['pracownik_id' => [$_GET['pracownik_id'] => ['Model'=>'nazwisko']]]) ?>

    <?= $form->field($model, 'cel_id')->dropDownList(ArrayHelper::map(Cel::find()
        ->all(),'cel_id','miasto') ,['cel_id' => [$_GET['cel_id'] => ['Model'=>'miasto']]]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Utwórz' : 'Zapisz', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
