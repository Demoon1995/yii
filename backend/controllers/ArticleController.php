<?php

namespace backend\controllers;

use backend\models\Article;
use backend\models\ArticleCategory;
use backend\models\ArticleDetail;
use yii\helpers\ArrayHelper;

class ArticleController extends \yii\web\Controller
{

    //配置upload
    public function actions()
    {
        return [
            'upload' => [
                'class' => 'kucha\ueditor\UEditorAction',
            ]
        ];
    }


    public function actionIndex()
    {

        $models=Article::find()->all();
//        var_dump($models);exit;
        //显示视图
        return $this->render('index',compact("models"));
    }


    //添加文章
    public function actionAdd(){
        //创建文章模型对象
        $model=new Article();

        //文章内容对象
        $detal=new ArticleDetail();

        //得到所有分类
        $cates=ArticleDetail::find()->asArray()->all();
//        var_dump($cates);exit;
        //转换成键值对
        $catesArr=ArrayHelper::map($cates,'id','content');

        $request=\Yii::$app->request;

        //判断是不是post提交
        if ($request->isPost){
            //绑定数据库
            $model->load($request->post());
            //验证
            if ($model->validate()) {
                //保存数据
                $model->save();

                if ($detal->load($request->post())) {

                    $detal->article_id=$model->id;
                    if ($detal->save()) {
                        \Yii::$app->session->setFlash("success","添加成功");

                        return $this->redirect(['index']);
                    }
                }

            }else{
                var_dump($model->errors);exit;
            }
        }


//        显示视图
        return $this->render('add', compact('model','detal','catesArr'));
    }


    //修改文章
    public function actionEdit($id){
        //创建文章模型对象
//        $model=new Article();
            $model=Article::findOne($id);
        //文章内容对象
        $detal=new ArticleDetail();
//        $detal=ArticleDetail::findOne($id);
        //得到所有分类
        $cates=ArticleDetail::find()->asArray()->all();
//        var_dump($cates);exit;
        //转换成键值对
        $catesArr=ArrayHelper::map($cates,'id','content');

        $request=\Yii::$app->request;

        //判断是不是post提交
        if ($request->isPost){
            //绑定数据库
            $model->load($request->post());
            //验证
            if ($model->validate()) {
                //保存数据
                $model->save();

                if ($detal->load($request->post())) {

                    $detal->article_id=$model->id;
                    if ($detal->save()) {
                        \Yii::$app->session->setFlash("success","添加成功");

                        return $this->redirect(['index']);
                    }
                }

            }else{
                var_dump($model->errors);exit;
            }
        }


//        显示视图
        return $this->render('add', compact('model','detal','catesArr'));
    }

    //删除文章
    public function actionDel($id){

        if (Article::findOne($id)->delete()) {
            \Yii::$app->session->setFlash("success",'删除成功');
            return $this->redirect(['index']);
        }

    }
}
