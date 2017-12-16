<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Word */

$this->title = 'Update Word: ' . $model->id_word;
$this->params['breadcrumbs'][] = ['label' => 'Words', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_word, 'url' => ['view', 'id' => $model->id_word]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="word-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
