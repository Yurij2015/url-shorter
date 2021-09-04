<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UrlTransitions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="url-transitions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url_idurl')->textInput() ?>

    <?= $form->field($model, 'entry_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
