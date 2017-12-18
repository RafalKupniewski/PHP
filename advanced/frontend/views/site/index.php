<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;


$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Dzien Dobry</h1>

    <p> Aplikacja Słówka </p>
    <?php echo 'user=' . Yii::$app->user->identity->username . '<br>' ;?>
    <?php echo 'email=' . Yii::$app->user->identity->email   ;?>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">




                </a></p>
            </div>
        </div>

    </div>
</div>
