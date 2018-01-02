<?php

namespace backend\controllers;

use backend\models\GoodsCategory;
use yii\db\Exception;
use yii\helpers\Json;

class GoodsCategoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        //查询所有数据
        $cates=GoodsCategory::find()->orderBy('tree,lft')->all();
        //显示视图
        return $this->render('index',compact('cates'));
    }


    //添加
    public function actionAdd(){
        //创建一个分类模型对象
        $model=new GoodsCategory();
        //找出所有分类
        $cates=GoodsCategory::find()->asArray()->all();
        $cates[]=['id'=>0,'name'=>'一级目录','parent_id'=>0];
//        var_dump($cates);exit;
//        var_dump(Json::encode($cates));exit;
        $cates=Json::encode($cates);

        $request=\Yii::$app->request;
        if ($request->isPost) {
            //数据绑定
            $model->load($request->post());

            //后端验证
            if ($model->validate()) {

                if ($model->parent_id==0){

                    $model->makeRoot();

                    \Yii::$app->session->setFlash("success","添加一级分类".$model->name."成功");


                }else{
                    //2. 追加到对应的父类
                    //2.1. 找到父节点
                    $cateParent=GoodsCategory::findOne($model->parent_id);


                    //.创建一个新节点

                    // 把新节点加入到父节点
                    $model->prependTo($cateParent);
                    \Yii::$app->session->setFlash("success","把".$model->name."添加到".$cateParent->name."成功");

                }

                //刷新
                return $this->refresh();


            }


        }

        return $this->render('add', ['model' => $model,'cates'=>$cates]);



    }
    public function actionEdit($id){
        //创建一个分类模型对象
        //$model=new Category();
        $model=GoodsCategory::findOne($id);
        //找出所有分类
        $cates=GoodsCategory::find()->asArray()->all();
        $cates[]=['id'=>0,'name'=>'目录','parent_id'=>0];

//        var_dump(Json::encode($cates));exit;
        $cates=Json::encode($cates);

        $request=\Yii::$app->request;
        if ($request->isPost) {
            //数据绑定
            $model->load($request->post());

            //后端验证
            if ($model->validate()) {

                //捕获异常
                try{
                    //执行代码，如果出现错误，跳到catch中去执行

                    if ($model->parent_id==0){
                        // 创建一级分类

                        $model->save();

                        \Yii::$app->session->setFlash("success","修改一级分类".$model->name."成功");


                    }else{
                        // 找到对应的父节点
                        $cateParent=GoodsCategory::findOne($model->parent_id);

                        //创建一个新节点 加入到 父节点


                        $model->prependTo($cateParent);

                        \Yii::$app->session->setFlash("success","修改成功");
                    }
                }catch (Exception $exception){

                    //var_dump($exception->getMessage());exit;

                    \Yii::$app->session->setFlash("danger",$exception->getMessage());

                    return $this->refresh();
                }
                //刷新
                return $this->redirect(['index']);

            }

        }
        return $this->render('add', ['model' => $model,'cates'=>$cates]);

    }
    //删除
    public function actionDel($id){

        if (GoodsCategory::findOne($id)->deleteWithChildren()) {
            \Yii::$app->session->setFlash("success",'删除成功');
            return $this->redirect(['goods-category/index']);
        }

    }
}
