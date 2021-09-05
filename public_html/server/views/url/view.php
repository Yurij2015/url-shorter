<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Url */

$this->title = $model->url;
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
//            'shorter_url:url',
            [
                'label' => 'Shorter Url',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a(
                        Url::to(['url/view-url', 'shorter_url' => $data->shorter_url]),
//                        'localhost/' . $data->shorter_url,
                        [
                            'url/view-url',
                            'shorter_url' => $data->shorter_url,
                        ]
//                        [$data->shorter_url,]
                    );
                }
            ],

            'redirect_limit',
            'shorter_url_lifetime',
            'time_create',
        ],
    ]) ?>

</div>
