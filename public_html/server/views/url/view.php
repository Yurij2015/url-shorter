<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Url */

$this->title = $model->idurl;
$this->params['breadcrumbs'][] = ['label' => 'Urls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="url-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idurl' => $model->idurl], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idurl' => $model->idurl], [
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
            'idurl',
            'url:url',
            'shorter_url:url',
            'redirect_limit',
            'shorter_url_lifetime:datetime',
            'time_create',
        ],
    ]) ?>

</div>
