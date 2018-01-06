<?php

namespace backend\controllers;

use backend\models\AuthItem;

class PermissionController extends \yii\web\Controller
{
    public function actionIndex()
    {

        //实例化autumanager组件

        $anth=\Yii::$app->authManager;

        //获取所有权限
        $permission=$anth->getPermissions();

        return $this->render('index',compact('permission'));
    }


    //添加
    public function actionAdd(){

        //实例化autumanager组件
        $auth=\Yii::$app->authManager;

        $model=new AuthItem();
        //判断post提交
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

            //创建权限
            $permission=$auth->createPermission($model->name);

            //设置权限
            $permission->description=$model->description;

            //添加入库
            if ($auth->add($permission)) {
                \Yii::$app->session->setFlash('success','添加权限'.$model->name.'成功');
                return $this->redirect(['permission/index']);
            }
        }

        return $this->render('add',compact('model'));
    }



    //修改
    public function actionEdit($name){

        //实例化autumanager组件
        $auth=\Yii::$app->authManager;

//        $model=new AuthItem();
        $model=AuthItem::findOne($name);

        //判断post提交
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

            //找到权限修改
            $permission=$auth->getPermission($model->name);
            if ($permission) {

                $permission->description=$model->description;

                //修改
                if ($auth->update($name,$permission)) {
                    \Yii::$app->session->setFlash('success','修改权限'.$model->name.'成功');
                    return $this->redirect(['permission/index']);
                }
            }
        }

        return $this->render('edit',compact('model'));
    }


    //删除
    public function actionDel($name){

//        /实例化组件
        $auth=\Yii::$app->authManager;
       //找到对象
        $permission=$auth->getPermission($name);

        //删除对象
        if ($auth->remove($permission)) {

            return $this->redirect(['permission/index']);
        }
    }
}
