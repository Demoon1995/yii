<?php

namespace frontend\controllers;

use backend\models\Goods;

class CartController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionLists(){

        //判断是否登录
        if (\Yii::$app->user->isGuest) {

            $cart=\Yii::$app->request->cookies->getValue('cart',[]);
            //取出所有商品id
            $goodIds=array_keys($cart);
//            var_dump($goodIds);exit;
                $goods=Goods::find()->where(['in','id',$goodIds])->asArray()->all();
//                var_dump($goods);exit;

                foreach ($goods as $k=>$good){

                    $goods[$k]['num']=$cart[$goods['id']];
                }

        }else{

        }


        return $this->render('lists',compact('goods'));
    }


        public function actionAdd($id,$amout){


        //取出购物车中的数据
            $cartOld=\Yii::$app->request->cookies->getValue('cart',[]);

            //判定当前商品id是否存在
            if (array_key_exists($id,$cartOld)) {

                //存在+1
                $cartOld[$id]=$cartOld[$id]+$amout;

                var_dump($cartOld[$id]);
            }else{

                $cartOld[$id]=(int)$amout;
                var_dump($cartOld[$id]);
            }

        //得到cookie对象
            $setCookie=\Yii::$app->request->cookies;
            //生成对象
            $cookie=new Cookie(
                [

                'name'=>'cart',
                'value'=>$cartOld
                ]
            );

            //添加对象
            $setCookie->add($cookie);
            return $this->redirect('cart/lists');
         }

    public function actionUpdate($id,$amount){
        //取出cookie中购物车中的数据
        $cart=\Yii::$app->request->cookies->getValue('cart',[]);
        $cart[$id]=$amount;
        //1.得到设置cookie对象
        $setCookie=\Yii::$app->response->cookies;
//        生成一个cookie对象
        $cookie=new Cookie(
            [
                'name'=>'cart',
                'value' =>$cart
            ]
        );
//        添加一个cookie对象
        $setCookie->add($cookie);
    }
}
