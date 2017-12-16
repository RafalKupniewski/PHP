<?php

use yii\helpers\Html;
use app\models\Auto;


/* @var $this yii\web\View */
/* @var $model app\models\Pracownik */

$this->title = 'Dodaj Pracownika';
$this->params['breadcrumbs'][] = ['label' => 'Pracownicy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pracownik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'auto.model' => $auto,
    ]) ?>

</div>
