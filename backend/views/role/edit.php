<?php
/**
 * Created by PhpStorm.
 * User: Demon
 * Date: 2018/1/5
 * Time: 0:38
 */


$form=\yii\bootstrap\ActiveForm::begin();
echo $form->field($model,'name')->textInput(['disabled'=>'disabled']);
echo $form->field($model,'description')->textarea();
echo $form->field($model,'description')->checkboxList($perArr);

echo \yii\bootstrap\Html::submitButton('提交',['class'=>'btn btn-success']);

\yii\bootstrap\ActiveForm::end();