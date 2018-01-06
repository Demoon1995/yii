<?php

namespace backend\controllers;

use backend\models\Admin;
use common\models\LoginForm;


class AdminController extends \yii\web\Controller
{

    //登录
    public function actionLogin()
    {
        $model=new LoginForm();
        $request=\Yii::$app->request;

        if ($request->isPost) {

            $model->load($request->post());
            $result=Admin::find()->where(['username'=>$model->username])->one();

            //验证
            if ($result) {
                $password=\Yii::$app->security->validatePassword($model->password,$result->password);

                if ($password) {
                    //密码正确，就直接登录
                    \Yii::$app->user->login($result,$model->rememberMe?3600*24*7:0);
                    //登录时间
                    $result->login_at=date('Ymd');

                    //登录的IP
                    $result->login_ip=\Yii::$app->request->userIP;
                    $result->save(false);

                    return $this->redirect(['admin/index']);

                }else{
                    $model->addError('password','登录密码错误');
                }



            }else{
                $model->addError('username','该用户不存在');
            }

        }


        //显示视图
        return $this->render('login',compact('model'));
    }

    //显示视图
    public function actionIndex()
    {
        $model=Admin::find()->all();
        return $this->render('index',compact('model'));
    }

    //添加管理员
    public function actionAdd()
    {
        $model=new Admin();
        $model->scenario='create';
        $request=\Yii::$app->request;

        if ($request->isPost) {
            $model->load($request->post());
            if ($model->validate()) {
                $model->password=\Yii::$app->security->generatePasswordHash($model->password);
//                $model->token=\Yii::$app->security->generateRandomString();

                $model->save();

                \Yii::$app->session->setFlash('info','添加成功');
                \Yii::$app->user->login($model,3600*24*7);

                //最后登录的时间
                $model->login_at=date('Ymd');

                //最后登陆的IP
                $model->login_ip=\Yii::$app->request->userIP;
                $model->save();

                return $this->redirect(['admin/index']);


            }else{
                var_dump($model->getErrors());exit;
            }
        }

        return  $this->render('add',compact('model'));

    }

    //编辑
    public function actionEdit($id)
    {
//        $model=new Admin();
        $model=Admin::findOne($id);
        $model->scenario='update';
        $password=$model->password;
        $model->password='';
        $request=\Yii::$app->request;

        if ($request->isPost) {
            $model->load($request->post());


            if ($model->validate()) {

                if (empty($request->post()["Admin"]['password'])) {

                    $model->password=$password;

                }else{
                    $model->password=\Yii::$app->security->generatePasswordHash($request->post()['Admin']['password']);
                }


//                $model->token=\Yii::$app->security->generateRandomString();

                $model->save();

                \Yii::$app->session->setFlash('info','修改成功');


//                //最后登录的时间
//                $model->login_at=date('Ymd');
//
//                //最后登陆的IP
//                $model->login_ip=\Yii::$app->request->userIP;
//                $model->save();

                return $this->redirect(['admin/index']);


            }else{
                var_dump($model->getErrors());exit;
            }
        }

        return  $this->render('add',compact('model'));

    }


    //删除
    public function actionDel($id){
        if (Admin::findOne($id)->delete()) {
            return $this->redirect(['admin/login']);
        }
    }


    //退出
    public function actionLogout(){
        if (\Yii::$app->user->logout()) {
            return $this->redirect(['admin/login']);
        }
    }

}
