<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pracownik */

$this->title = 'Zmodyfikuj pracownika: ' . $model->imie .' '.$model->nazwisko ;
$this->params['breadcrumbs'][] = ['label' => 'Pracownik', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->imie .' '.$model->nazwisko, 'url' => ['view', 'id' => $model->pracownik_id]];
$this->params['breadcrumbs'][] = 'Zapisz';
?>
<div class="pracownik-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>
