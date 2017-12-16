<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Miasta';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cel-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dodaj miasto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'cel_id',
            'miasto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
