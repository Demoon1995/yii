<?php

namespace backend\controllers;

use backend\models\Brand;
use backend\models\Goods;
use backend\models\GoodsCategory;
use backend\models\GoodsGallery;
use backend\models\GoodsIntro;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

class GoodsController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'upload'=>[
                'class'=>'kucha\ueditor\UEditorAction',
            ]
        ];
    }


    public function actionIndex()
    {
        //得到所有数据
        $query=Goods::find();
        //根据搜索条件得到结果
        $request=\Yii::$app->request;
        $minPrice=$request->get('minPrice');
        $maxPrice=$request->get('maxPrice');
        $keyword=$request->get('keyword');
        $status=$request->get('status');
        if ($minPrice){
            $query->andWhere("shop_price>={$minPrice}");
        }

        if ($maxPrice){
            $query->andWhere("shop_price<={$maxPrice}");
        }


        if ($keyword){
            $query->andWhere("name like '%{$keyword}%' or sn like '%{$keyword}%'");
        }
        if (in_array($status,['1','0'])){
            exit($status);
        }
        //分页对象
            $pages=new Pagination(
                [
                    'totalCount' => $query->count(),
                    'pageSize' => 3
                ]
            );

        $models=$query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }

    //添加
     public function actionAdd(){

        //创建商品模型对象
         $model=new Goods();
         //创建商品详情模型
         $goodsIntro=new GoodsIntro();


         //把所有商品分类传过来
         $cates=GoodsCategory::find()->orderBy('tree, lft')->all();
         //转化成键值对
         $catesArr=ArrayHelper::map($cates,'id','nameText');

         //把所有商品品牌传过来
         $brands=Brand::find()->orderBy('id')->all();
         //转化成键值对
         $brandsArr=ArrayHelper::map($brands,'id','name');


         $request=\Yii::$app->request;
         if ($request->isPost){
             //商品数据绑定
             $model->load($request->post());
             //数据验证
             if ($model->validate()){
                 //判断货号sn是否有值
                 if (empty($model->sn)){
                     //自动生成  20180101+今天上传商品数量
                     $timeStart=strtotime(date('Ymd'));
                     //查出今天创建的所有商品数量
                     $count=Goods::find()->where("create_at>={$timeStart}")->count();
                     $count=$count+1;
                     //拼接4位货号
                     $count=substr("000".$count,-4);
                     //得到最终的货号
                     $model->sn=date("Ymd").$count;
                 }

                 //保存商品数据
                 if ($model->save()){
                     //保存商品详情
                     $goodsIntro->load($request->post());
                     $goodsIntro->goods_id=$model->id;
                     $goodsIntro->save();

                     //保存多图
                     foreach ($model->imgFiles as $img){
                         //一定要在这里new
                         $goodsGallery=new GoodsGallery();
                         //批量赋值
                         $goodsGallery->goods_id=$model->id;
                         $goodsGallery->path=$img;
                         //保存
                         $goodsGallery->save();
                     }
                 }
                 return $this->redirect(['index']);
             }
         }
         return $this->render("add",compact('model','catesArr','brandsArr','goodsIntro'));
     }




     public function actionEdit($id, $brands){
        //商品模型对象
         $model=Goods::findOne($id);

         //创建商品详情模型
         $goodsIntro=GoodsIntro::findOne($id);

         //查出当前商品所对应的所有图片
         $goodsImgs=GoodsGallery::find()->where(['goods_id'=>$id])->asArray()->all();
         //把处理好的一维数组赋值给imgFiles属性
         $model->imgFiles=array_column($goodsImgs,'path');
         //把所有商品分类给传过来
         $cates=GoodsCategory::find()->orderBy('tree,lft')->all();
         //转化成键值对
         $brandsArr=ArrayHelper::map($brands,'id','name');


         $request=\Yii::$app->request;
         if ($request->isPost){

             //商品数据绑定
             $model->load($request->post());
             //数据验证
             if ($model->validate()){
                 //判断货号sn是否有值
                 if (empty($model->sn)){
                     //自动生成      20180101+今天上传商品数量
                     $timeStart=strtotime(date('Ymd'));
                     //查出今天创建的所有商品数量
                     $count=Goods::find()->where("create_at>={$timeStart}")->count();
                     $count=$count+1;
                     //拼接4位货号
                     $count=substr("000".$count,-4);
                     //得到最终的货号
                     $model->sn=date("Ymd").$count;

                 }

                 //保存商品数据
                 if ($model->save()) {
                     //保存商品详情
                     $goodsIntro->load($request->post());
                     $goodsIntro->goods_id=$model->id;
                     $goodsIntro->save();

                     //保存多图
                     //删除所有图片
                     GoodsGallery::deleteAll(['goods_id'=>$id]);
                     foreach ($model->imgFiles as $img){
                         //一定要在这里new
                         $goodsGallery=new GoodsGallery();
                         //批量赋值
                         $goodsGallery->goods_id=$model->id;
                         $goodsGallery->path=$img;
                         //保存
                         $goodsGallery->save();

                     }
                     return $this->redirect(['index']);
                 }
             }
         }
         return $this->render("add", compact('model','catesArr','brandsArr','goodsIntro'));
     }
}
