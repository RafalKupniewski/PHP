<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Wyjazdy */

$this->title = 'Utworz wyjazd';
$this->params['breadcrumbs'][] = ['label' => 'Wyjazdy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wyjazdy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
