<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Subject */

$this->title = 'Update Subject: ' . $model->id_subject;
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_subject, 'url' => ['view', 'id' => $model->id_subject]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subject-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
