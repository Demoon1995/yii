<?php

namespace frontend\controllers;

class HomeController extends \yii\web\Controller
{
    public function actionIndex()
    {

        return $this->render('index');
    }

}
