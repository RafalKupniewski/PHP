<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Login */

$this->title = 'Update Login: ' . $model->id_login;
$this->params['breadcrumbs'][] = ['label' => 'Logins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_login, 'url' => ['view', 'id' => $model->id_login]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="login-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
