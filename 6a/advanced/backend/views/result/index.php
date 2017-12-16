<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchResult */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="result-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Result', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_result',
            'score',
            'privilege',
            'id_login',
            'id_subject',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
