<?php

namespace backend\controllers;

use backend\models\AuthItem;
use yii\helpers\ArrayHelper;

class RoleController extends \yii\web\Controller
{
    public function actionIndex()
    {

        //实例化authManager组件

        $auth=\Yii::$app->authManager;

        //获取所有角色
        $roles=$auth->getRoles();

        return $this->render('index',['roles'=>$roles]);
    }


    //添加
    public function actionAdd(){


        //实例化authManager组件
        $auth=\Yii::$app->authManager;

        $model=new AuthItem();
        //找出所有权限
        $pers=$auth->getPermissions();
        $perArr=ArrayHelper::map($pers,'name','description');
//            var_dump(\Yii::$app->request->post());exit;
        //判断post提交
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
                //创建角色
            $role=$auth->createRole($model->name);
            //设置描述
            $role->description=$model->description;
//            var_dump($role);
//            var_dump($model->permissions);exit;
            //添加入库
            if ($auth->add($role)) {

                if ($model->permissions) {
                   //给角色添加权限
                    foreach ($model->permissions as $persName){

                        $permission=$auth->getPermission($persName);

                        $auth->addChild($role,$permission);
                    }
                }
                \Yii::$app->session->setFlash("success",'添加角色'.$model->name."成功");
                    return $this->redirect(['role/index']);
            }


        }


        return $this->render('add',compact('model','perArr'));
    }

    //修改
    public function actionEdit($name){


        //实例化authManager组件
        $auth=\Yii::$app->authManager;

//        $model=new AuthItem();
        $model=AuthItem::findOne($name);
        //找出所有权限
        $pers=$auth->getPermissions();
        $perArr=ArrayHelper::map($pers,'name','description');
//            var_dump(\Yii::$app->request->post());exit;
        //判断post提交
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            //创建角色
            $role=$auth->getRole($model->name);
            //设置描述
            $role->description=$model->description;
//            var_dump($role);
//            var_dump($model->permissions);exit;
            //添加入库
            if ($auth->update($name,$role)) {
                $auth->removeChildren($role);
                if ($model->permissions) {
                    //给角色添加权限
                    foreach ($model->permissions as $persName){

                        $permission=$auth->getPermission($persName);

                        $auth->addChild($role,$permission);
                    }
                }
                \Yii::$app->session->setFlash("success",'修改角色'.$model->name."成功");
                return $this->redirect(['role/index']);
            }


        }


        return $this->render('add',compact('model','perArr'));
    }

    //删除
    public function actionDel($name){

            //实例化authManager组件
            $auth = \Yii::$app->authManager;

            $role=$auth->getRole($name);
            $auth->removeChildren($role);

            //删除角色
            if ($auth->remove($role)) {

                return $this->redirect(['role/index']);
            }

        }
}
