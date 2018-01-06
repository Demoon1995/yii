<?php
/**
 * Created by PhpStorm.
 * User: Demon
 * Date: 2018/1/4
 * Time: 21:32
 */

$form=\yii\bootstrap\ActiveForm::begin();
echo $form->field($model,'name');
echo $form->field($model,'description')->textarea();

echo \yii\bootstrap\Html::submitButton('提交',['class'=>'btn btn-success']);

\yii\bootstrap\ActiveForm::end();