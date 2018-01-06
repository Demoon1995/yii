<?php
/**
 * Created by PhpStorm.
 * User: Demon
 * Date: 2018/1/4
 * Time: 22:20
 */

$form=\yii\bootstrap\ActiveForm::begin();
echo $form->field($model,'name')->textInput(['disabled'=>'disabled']);
echo $form->field($model,'description')->textarea();

echo \yii\bootstrap\Html::submitButton('提交',['class'=>'btn btn-success']);

\yii\bootstrap\ActiveForm::end();