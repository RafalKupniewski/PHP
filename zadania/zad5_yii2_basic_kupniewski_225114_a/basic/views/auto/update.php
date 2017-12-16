<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Auto */

$this->title = 'Zaktualizuj: ' . $model-> marka .' '. $model->model;
$this->params['breadcrumbs'][] = ['label' => 'Auto', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->auto_id, 'url' => ['view', 'id' => $model->auto_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="auto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
