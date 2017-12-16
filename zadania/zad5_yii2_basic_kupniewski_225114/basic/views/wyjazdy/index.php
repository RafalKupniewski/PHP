<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Pracownik;
use app\models\Pw;
use app\models\Cel;
use app\models\Auto;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WyjazdySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wyjazdy';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wyjazdy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Utworz wyjazd', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'pw_id',
            'data',
            //'pracownik.imie',
            //'pw.pracownik_id',
            //'pw.cel_id',
            'pw.pracownik.imie',
            'pw.pracownik.nazwisko',
            'pw.cel.miasto',
            'pw.pracownik.auto.marka',
            'pw.pracownik.auto.model',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
