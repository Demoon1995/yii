<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Brand */
/* @var $form ActiveForm */
?>
<div class="brandadd">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'logo') ?>
        <?= $form->field($model, 'status') ?>
        <?= $form->field($model, 'sort') ?>
        <?= $form->field($model, 'intro') ?>
        <?= $form->field($model, 'logoFile') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- brandadd -->
