<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\ArticleCategory */
/* @var $form ActiveForm */
?>
<div class="article-add">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title') ?>
    <?= $form->field($model, 'cate_id')->dropDownList($catesArr) ?>
    <?= $form->field($model, 'intro') ?>
    <?= $form->field($model, 'status')->radioList(['1'=>"显示",'0'=>"隐藏"]) ?>
    <?= $form->field($model, 'sort')->textInput(['value'=>100])?>
    <?= $form->field($detal, 'content')->widget('kucha\ueditor\UEditor',[]); ?>

    <div class="form-group">
        <?= Html::submitButton('添加', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>