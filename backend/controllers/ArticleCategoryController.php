<?php

namespace backend\controllers;

use backend\models\ArticleCategory;
use yii\web\Request;

class ArticleCategoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        //得到数据
        $models= ArticleCategory::find()->all();
        //显示视图
        return $this->render('index',compact('models'));
    }

    public function actionAdd(){
        //创建对象
        $model=new ArticleCategory();

        $request=\Yii::$app->request;

        if ($request->isPost){

            //绑定数据库
            $model->load($request->post());

            //验证
            if ($model->validate()) {
                //保存数据
                $model->save();
                \Yii::$app->session->setFlash("success","添加");

                return $this->redirect(['index']);
            }


        }


//        显示视图
        return $this->render('add', ['model' => $model]);
    }
    public function actionEdit($id){
        //创建对象
//        $model=new ArticleCategory();
        $model=ArticleCategory::findOne($id);
        $request=\Yii::$app->request;

        if ($request->isPost){

            //绑定数据库
            $model->load($request->post());

            //验证
            if ($model->validate()) {
                //保存数据
                $model->save();
                \Yii::$app->session->setFlash("success","编辑");

                return $this->redirect(['index']);
            }


        }

        //
//        显示视图
        return $this->render('add', ['model' => $model]);
    }
    public function actionDel($id){

        if (ArticleCategory::findOne($id)->delete()) {
            \Yii::$app->session->setFlash("success",'删除成功');
            return $this->redirect(['index']);
        }

    }
}
