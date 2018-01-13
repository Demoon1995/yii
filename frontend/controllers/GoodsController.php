<?php

namespace frontend\controllers;

use backend\models\Goods;
use backend\models\GoodsCategory;

class GoodsController extends \yii\web\Controller
{
    public function actionIndex()
    {

//        var_dump($id);exit;
        return $this->render('index');
    }




    public function actionLists($id){

        //找到当前分类
        $cate=GoodsCategory::findOne($id);

        $cateSons=GoodsCategory::find()->where(['tree'=>$cate->tree])->andWhere("lft>={$cate->lft}")->andWhere("rgt<={$cate->rgt}")->asArray()->all();

//        var_dump($cateSons);exit;
        //提取二维数组id的值
        $cateIds=array_column($cateSons,'id');

        //找到符合条件的商品
        $goods=Goods::find()->where(['in','category_id',$cateIds])->andWhere(['status'=>1])->all();



        return $this->render('lists',compact('goods'));

    }

    public function actionDetail($id){

        //找到当前的商品
        $good=Goods::findOne($id);

//        var_dump($good->images);exit;

        return $this->render("detail",compact('good'));

    }

    public function actionAddress(){



        return $this->render('address');
    }
}
