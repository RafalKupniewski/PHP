<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Pracownik;
use app\models\Pw;
use app\models\Cel;
use app\models\Auto;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Wyjazdy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wyjazdy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pw_id')->textInput() ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <!--?= $form->field($model, 'pw_id')>dropDownList(ArrayHelper::map(Pw::find() ->all(),'pracownik_id','pracownik_id') ,['pracownik_id' => [$_GET['pracownik_id']]]) ?-->

    <!--?= $form->field($model, 'pracownik_id')->dropDownList(ArrayHelper::map(Pw::find()
        ->all(),'pracownik.pracownik_id','pw.pracownik.imie','pw.pracowanik.nazwisko') ,['pw.pracownik_id' => [$_GET['pw.pracownik_id'] => ['Model'=>'pw.pracownik.nazwisko']]]) ?-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Utworz' : 'Zapisz', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
