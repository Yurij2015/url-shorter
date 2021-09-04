<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Url */

$this->title = 'Update Url: ' . $model->idurl;
$this->params['breadcrumbs'][] = ['label' => 'Urls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idurl, 'url' => ['view', 'idurl' => $model->idurl]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="url-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
