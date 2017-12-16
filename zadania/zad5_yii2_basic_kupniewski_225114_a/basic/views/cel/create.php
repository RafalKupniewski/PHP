<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cel */

$this->title = 'Dodaj miasto';
$this->params['breadcrumbs'][] = ['label' => 'Miasta', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
