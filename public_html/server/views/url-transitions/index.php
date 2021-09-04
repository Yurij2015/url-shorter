<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Url Transitions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="url-transitions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Url Transitions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_url_transitions:url',
            'url_idurl:url',
            'entry_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
