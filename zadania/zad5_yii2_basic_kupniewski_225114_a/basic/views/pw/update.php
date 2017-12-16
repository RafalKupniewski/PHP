<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pw */

$this->title = 'Aktualizuj wyjazd: ' . $model->pw_id;
$this->params['breadcrumbs'][] = ['label' => 'Wyjazdy', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pw_id, 'url' => ['view', 'id' => $model->pw_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pw-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
