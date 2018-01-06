<?php
/**
 * Created by PhpStorm.
 * User: Demon
 * Date: 2018/1/4
 * Time: 23:38
 */


$form=\yii\bootstrap\ActiveForm::begin();
echo $form->field($model,'name')->label('组名');
echo $form->field($model,'description')->textarea()->label('组描述');
echo $form->field($model,'permissions')->checkboxList($perArr);

echo \yii\bootstrap\Html::submitButton('提交',['class'=>'btn btn-success']);

\yii\bootstrap\ActiveForm::end();