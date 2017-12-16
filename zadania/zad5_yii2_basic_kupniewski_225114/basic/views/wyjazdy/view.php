<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Wyjazdy */

$this->title = $model->data;
$this->params['breadcrumbs'][] = ['label' => 'Wyjazdy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wyjazdy-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Aktualizuj', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Skasuj', ['delete', 'id' => $model->id], [
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
            'id',
            'pw_id',
            'data',
        ],
    ]) ?>

</div>
