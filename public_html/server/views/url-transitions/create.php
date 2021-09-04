<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UrlTransitions */

$this->title = 'Create Url Transitions';
$this->params['breadcrumbs'][] = ['label' => 'Url Transitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="url-transitions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
