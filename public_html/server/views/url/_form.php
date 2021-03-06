<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Url */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="url-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url')->textInput() ?>

    <?= $form->field($model, 'redirect_limit')->textInput() ?>

    <?= $form->field($model, 'shorter_url_lifetime')->textInput(['type' => 'number' ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
