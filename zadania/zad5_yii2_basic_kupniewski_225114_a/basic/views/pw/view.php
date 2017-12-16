<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pw */

$this->title = $model->data;
$this->params['breadcrumbs'][] = ['label' => 'Wyjazdy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pw-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Aktualizuj', ['update', 'id' => $model->pw_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Usuń', ['delete', 'id' => $model->pw_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'pw_id',
            //'pracownik_id',
            //'cel_id',
            //'pw_id',
            //'pracownik_id' ,
            'data',
            'pracownik.imie',
            'pracownik.nazwisko',
            'cel.miasto',
            //'wyjazdy.pw.data',
            'pracownik.auto.marka',
            'pracownik.auto.model',
            //'cel_id',
        ],
    ]) ?>

</div>
