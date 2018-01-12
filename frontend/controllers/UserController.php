<?php

namespace frontend\controllers;

use frontend\models\User;
use Mrgoon\AliSms\AliSms;
use yii\helpers\Json;

class UserController extends \yii\web\Controller
{

//    public $enableCsrfValidation=false;
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'minLength' => 3,
                'maxLength' => 4
            ],
        ];
    }


    public function actionIndex()
    {
        return $this->render('index');
    }

    //注册 页面
    public function actionRegist(){

        $request=\Yii::$app->request;

        if ($request->isPost){

//            var_dump($request->post());
            //添加用户
            $user=new User();


            //数据绑定
            $user->load($request->post());
                //后台验证
            if ($user->validate()) {
                //保存数据
                $user->password_hash=\Yii::$app->security->generatePasswordHash($user->password);
                $user->auth_key=\Yii::$app->security->generateRandomString();
                if ($user->save(false)) {

                    //返回数据
                    return Json::encode(
                        [
                            'status'=>1,
                            'msg'=>'注册成功',
                            'data'=>null
                        ]
                    );
                    return $this->redirect(['user/resist']);

                }

            }
            return Json::encode([
                'status'=>0,
                'msg'=>'注册失败',
                'data'=>$user->errors

            ]);
            var_dump($user->errors);exit;
            $user->username=$request->post('username');
            $user->password_hash=\Yii::$app->security->generatePasswordHash($request->post('password'));
            $user->mobile=$request->post('mobile');
//            var_dump($user->password_hash);exit;
            if ($user->save()) {
                return 1;
            }else{
                var_dump($user->errors);exit;
            }
        }
        return $this->render('regist');
    }


    //短信验证

    public function actionSms($mobile){

        //发送验证

        //生成验证码 随机6位

        $code=rand(100000,999999);

        //发送验证给手机
        //配置文件
        $config = [
            'access_key' => 'LTAIWjQQxCTYZV7a',
            'access_secret' => 'PTe4WXjRJGGm2tq4K47jVDxDxzmiUx',
            'sign_name' => '邓如意',
        ];
        //创建短信发送对象
        $aliSms=new AliSms();

        //发送短信
        $response = $aliSms->sendSms($mobile, 'SMS_120365835', ['code'=> $code], $config);

        var_dump($response);
        //把验证码存起来
        \Yii::$app->session->set($mobile,$code);

        return $code;


    }


    //验证码的验证
    public function actionCheck($mobile){

        //根据手机号去对应的验证码
        $code=\Yii::$app->session->get($mobile);

        return $code;
    }

    public function actionLogin(){

            $request=\Yii::$app->request;

        if ($request->isPost) {

            //创建对象
            $model=new User();
            $model->scenario="login";

            //绑定数据
            $model->load($request->post());



            //后台验证
            if ($model->validate()) {

                //找到对象
                $user=User::findOne(['username'=>$model->username]);
//                var_dump($user);exit;
                //判断用户是否存在  密码是否正确
                if ($user && \Yii::$app->security->validatePassword($model->password,$user->password_hash)) {

                    //用户登录
                    \Yii::$app->user->login($user,$model->rememberMe?3600*24:0);
                    return $this->redirect(['home/index']);

                 }else{

                    echo "<script>alert($model->errors)</script>";
              }
          }else{
                var_dump($model->errors);exit;
            }
      }


        return $this->render('login');
    }



    public function actionLogout(){


        \Yii::$app->user->logout();

            return $this->redirect(['home/index']);
        }


}
