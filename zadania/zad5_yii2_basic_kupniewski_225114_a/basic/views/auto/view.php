<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Auto */

$this->title = $model->marka.' '.$model->model ;
$this->params['breadcrumbs'][] = ['label' => 'Auto', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Aktualizuj', ['update', 'id' => $model->auto_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Usuń', ['delete', 'id' => $model->auto_id], [
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
            //'auto_id',
            'marka',
            'model',
        ],
    ]) ?>

</div>
