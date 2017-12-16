<?php

use yii\helpers\Html;
use app\models\Pracownik;
use app\models\Cel;

/* @var $this yii\web\View */
/* @var $model app\models\Pw */

$this->title = 'Utworz wyjazd';
$this->params['breadcrumbs'][] = ['label' => 'Wyjazdy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pw-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data' => $model,
    ]) ?>

</div>
