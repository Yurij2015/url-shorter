<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UrlTransitions */

$this->title = $model->id_url_transitions;
$this->params['breadcrumbs'][] = ['label' => 'Url Transitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="url-transitions-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_url_transitions' => $model->id_url_transitions], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_url_transitions' => $model->id_url_transitions], [
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
            'id_url_transitions:url',
            'url_idurl:url',
            'entry_time',
        ],
    ]) ?>

</div>
