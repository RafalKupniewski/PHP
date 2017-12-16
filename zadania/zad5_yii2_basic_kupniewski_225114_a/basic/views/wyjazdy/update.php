<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Wyjazdy */

$this->title = 'Aktualizuj Wyjazd: ' . $model->data;
$this->params['breadcrumbs'][] = ['label' => 'Wyjazdy', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wyjazdy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
