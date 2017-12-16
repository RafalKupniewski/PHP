<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Pracownik;
use app\models\Cel;
use app\models\Wyjazdy;
use app\models\Auto;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PwSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wyjazdy';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pw-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Utwórz wyjazd', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
