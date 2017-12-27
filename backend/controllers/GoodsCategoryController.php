<?php

namespace backend\controllers;

use backend\models\GoodsCategory;
use yii\helpers\Json;

class GoodsCategoryController extends \yii\web\Controller
{
    public function actionIndex()
    {

        //获取所有数据
        $cates=GoodsCategory::find()->orderBy('tree,left')->all();

        return $this->render('index',compact('cates'));
    }

    //添加
    public function actionAdd()
    {
        $model=new GoodsCategory();
        //判断是不是Post提交
        $request=\Yii::$app->request;

        if ($request->isPost){

            //数据绑定
            $model->load($request->post());

            if ($model->validate()){

                //判断父亲Id是不是0 如果是0创建根目录
//
                if ($model->parent_id==0){
//                    //创建根目录
//
                    $model->makeRoot();
                }else{
//
                    //创建子分类
//
                    //把父节点找到
                    $cateParent=GoodsCategory::findOne(['id'=>$model->parent_id]);
//
                    //把当前节点对象添加到父类对象中
//
                    $model->prependTo($cateParent);
//
                }
                \Yii::$app->session->setFlash("success",'添加目录成功');
//
                //刷新
                return $this->refresh();

            }
//
        }
//        //得到所有的分类
        $cates=GoodsCategory::find()->asArray()->all();
        $cates[]=['id'=>0,'parent_id'=>0,'name'=>'顶级分类'];
        $cates=Json::encode($cates);


//         var_dump($cates);exit;

        //显示视图
        return $this->render("add",['model'=>$model,'cates'=>$cates]);

    }

    public function actionEdit($id)
    {
//        $model=new GoodsCategory();
        $model=GoodsCategory::findOne($id);
        //判断是不是Post提交
        $request=\Yii::$app->request;

        if ($request->isPost){

            //数据绑定
            $model->load($request->post());

            if ($model->validate()){

                //判断父亲Id是不是0 如果是0创建根目录
//
                if ($model->parent_id==0){
//                    //创建根目录
//
                    $model->makeRoot();
                }else{
//
                    //创建子分类
//
                    //把父节点找到
                    $cateParent=GoodsCategory::findOne(['id'=>$model->parent_id]);
//
                    //把当前节点对象添加到父类对象中
//
                    $model->prependTo($cateParent);
//
                }
                \Yii::$app->session->setFlash("success",'添加目录成功');
//
                //刷新
                return $this->refresh();

            }
//
        }
//        //得到所有的分类
        $cates=GoodsCategory::find()->asArray()->all();
        $cates[]=['id'=>0,'parent_id'=>0,'name'=>'顶级分类'];
        $cates=Json::encode($cates);


//         var_dump($cates);exit;

        //显示视图
        return $this->render("add",['model'=>$model,'cates'=>$cates]);

    }

    public function actionDel($id){

        if (GoodsCategory::findOne($id)->delete()) {
            \Yii::$app->session->setFlash("success",'删除成功');
            return $this->redirect(['goods-category/index']);
        }

    }




}
