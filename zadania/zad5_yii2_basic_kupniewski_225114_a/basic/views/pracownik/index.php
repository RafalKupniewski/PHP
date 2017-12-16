<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\model\Auto;


/* @var $this yii\web\View */
/* @var $searchModel app\models\PracownikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pracownicy';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pracownik-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dodaj Pracownika', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'pracownik_id',
            'imie',
            'nazwisko',
            //'auto_id',
            'auto.marka',
            'auto.model',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
