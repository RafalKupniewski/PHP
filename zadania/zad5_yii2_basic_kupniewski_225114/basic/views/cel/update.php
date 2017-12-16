<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cel */

$this->title = 'Aktualizuj miasto: ' . $model->miasto;
$this->params['breadcrumbs'][] = ['label' => 'Miasta', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cel_id, 'url' => ['view', 'id' => $model->cel_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
