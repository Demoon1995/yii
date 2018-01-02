<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Goods */
/* @var $form ActiveForm */
?>
<div class="goods-add">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'sn') ?>
    <?= $form->field($model, 'logo')->widget(\manks\FileInput::className(),['clientOptions' => [ 'server' => \yii\helpers\Url::to(['brand/upload'])]]) ?>
    <?= $form->field($model, 'category_id')->dropDownList($catesArr,['prompt'=>'请选择一个分类']
    ) ?>
    <?= $form->field($model, 'brand_id')->dropDownList($brandsArr) ?>
    <?= $form->field($model, 'market_price') ?>
    <?= $form->field($model, 'shop_price') ?>
    <?= $form->field($model, 'stock') ?>
    <?= $form->field($model, 'status')->radioList([0=>'下架',1=>'上架'],['value'=>1]) ?>
    <?= $form->field($model, 'sort')->textInput(['value'=>100]) ?>
    <?= $form->field($model, 'imgFiles')->widget('manks\FileInput', [
        'clientOptions' => [
            'pick' => [
                'multiple' => true,
            ],

            'server' => \yii\helpers\Url::to(['brand/upload']),

        ],
    ]); ?>

    <?= $form->field($goodsIntro, 'content')->widget(kucha\ueditor\UEditor::className(),[]) ?>

    <div class="form-group">
        <?= Html::submitButton('添加', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- goods-add -->
