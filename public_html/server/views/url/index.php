<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Urls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="url-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Url', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idurl',
//            'url:url',
            'url',
//            'shorter_url:url',
            'redirect_limit',
            'shorter_url_lifetime',

            [
                'label' => 'Ссылка',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a(
                         'localhost/' . $data->shorter_url,
                        [
                            'url/view-url',
                            'shorter_url' => $data->shorter_url,
                        ]
                    );
                }
            ],
//            'shorter_url_lifetime:datetime',
            //'time_create',
            ['class' => 'yii\grid\ActionColumn', 'template'=>'{view}'],
        ],
    ]); ?>


</div>
