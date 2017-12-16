<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Auto;

/* @var $this yii\web\View */
/* @var $model app\models\Pracownik */

$this->title = $model->imie.' '.$model->nazwisko;
$this->params['breadcrumbs'][] = ['label' => 'Pracownik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pracownik-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Zmień', ['update', 'id' => $model->pracownik_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Usuń', ['delete', 'id' => $model->pracownik_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Na pewno?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'pracownik_id',
            'imie',
            'nazwisko',
            'auto.marka',
            'auto.model',

        ],
    ]) ?>

</div>
