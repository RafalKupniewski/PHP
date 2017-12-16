<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cel */

$this->title = $model->miasto;
$this->params['breadcrumbs'][] = ['label' => 'Miasta', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Zapisz', ['update', 'id' => $model->cel_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Skasuj', ['delete', 'id' => $model->cel_id], [
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
            //'cel_id',
            'miasto',
        ],
    ]) ?>

</div>
