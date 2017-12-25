<?php

namespace backend\controllers;

use backend\models\Article;

class ArticleController extends \yii\web\Controller
{
    public function actionIndex()
    {
        //得到所有数据
        $articles=Article::find()->all();
        //显示视图
        return $this->render('index',compact('articles'));
    }

    public function actionAdd(){

    }
}
