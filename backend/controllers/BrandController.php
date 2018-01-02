<?php

namespace backend\controllers;

use backend\models\Brand;
use yii\web\UploadedFile;

class BrandController extends \yii\web\Controller
{
    public function actionIndex()
    {

         //得到所有数据
        $brands=Brand::find()->all();
        //视图显示
        return $this->render('index',compact('brands'));
    }



    public function actionAdd(){
        //生成模型对象
        $model=new Brand();

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
        //显示视图
        return $this->render('add', ['model' => $model]);
    }
    public function actionEdit($id){
        //生成模型对象
//        $model=new Brand();
        $model=Brand::findOne($id);

        $request=\Yii::$app->request;

        if ($request->isPost){

            //绑定数据库
            $model->load($request->post());

            //得到上传图片对象
            $model->logoFile=UploadedFile::getInstance($model,'logoFile');

            //验证
            if ($model->validate()) {
                //保存数据
                $model->save();
                \Yii::$app->session->setFlash("success","编辑");
                return $this->redirect(['index']);
            }


        }
        //显示视图
        return $this->render('add', ['model' => $model]);
    }


    public function actionDel($id){

        if (Brand::findOne($id)->delete()) {
            \Yii::$app->session->setFlash("success",'删除成功');
            return $this->redirect(['index']);
        }

    }

    public function actionUpload(){

//        var_dump($_FILES);
//        {"code": 0, "url": "http://domain/图片地址", "attachment": "图片地址"}
           $file=UploadedFile::getInstanceByName("file");
           if ($file){
               //路径
               $path="images/brand/".time().".".$file->extension;
               //移动图片
               if ($file->saveAs($path,false)) {
                   $result=[
                       'code'=>0,
                       'url'=>'/'.$path,
                       'attachment'=>$path
                   ];
                   return json_encode($result);
               }
           }








    }

}
