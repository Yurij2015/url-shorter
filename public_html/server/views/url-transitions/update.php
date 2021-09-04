<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UrlTransitions */

$this->title = 'Update Url Transitions: ' . $model->id_url_transitions;
$this->params['breadcrumbs'][] = ['label' => 'Url Transitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_url_transitions, 'url' => ['view', 'id_url_transitions' => $model->id_url_transitions]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="url-transitions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
