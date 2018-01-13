<?php

namespace frontend\controllers;

use app\models\Cart;
use backend\models\Goods;
use frontend\components\ShopCart;
use yii\helpers\ArrayHelper;
use yii\web\Cookie;

class CartController extends \yii\web\Controller
{

    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionLists()
    {

        //判断是否登录
        if (\Yii::$app->user->isGuest) {

            $cart = \Yii::$app->request->cookies->getValue('cart', []);
            //取出所有商品id
            $goodIds = array_keys($cart);
//            var_dump($goodIds);exit;

            $goods = Goods::find()->where(['in', 'id', $goodIds])->asArray()->all();
//                var_dump($goods);exit;

            foreach ($goods as $k => $good) {

                $goods[$k]['num'] = $cart[$good['id']];
            }
//            var_dump($goods);exit;
        } else {

            //登录后  保存在数据库

            $userId = \Yii::$app->user->id;
            $cart = Cart::find()->where(['user_id'=>$userId])->asArray()->all();

            $cartGoods = ArrayHelper::map($cart, 'goods_id', 'amount');

            $goodIds = array_column($cart, 'goods_id');


            $goods = Goods::find()->where(['in', 'id', $goodIds])->asArray()->all();
//                var_dump($goods);exit;

            foreach ($goods as $k => $good) {
//                var_dump($cart);
                $goods[$k]['num'] = $cartGoods[$good['id']];
                }
//            exit;
            }
            return $this->render('lists', compact('goods'));
        }


        public function actionAdd($id, $amout)
        {


//            //取出购物车中的数据
            $cartOld = \Yii::$app->response->cookies->getValue('cart', []);

            //判定当前商品id是否存在
            if (array_key_exists($id, $cartOld)) {

                /*//存在+1
                $cartOld[$id]=$cartOld[$id]+$amout;

                var_dump($cartOld[$id]);
            }else{

                $cartOld[$id]=(int)$amout;
                var_dump($cartOld[$id]);
            }

        //得到cookie对象
            $setCookie=\Yii::$app->response->cookies;
            //生成对象
            $cookie=new Cookie(
                [

                'name'=>'cart',
                'value'=>$cartOld
                ]
            );

            //添加对象
            $setCookie->add($cookie);*/


                //实例化购物车对象
                $shopCart = new ShopCart();

                $shopCart->add($id, $amout)->save();

            } else {
                $userId = \Yii::$app->user->id;

                $cart = Cart::findOne(['goods_id' => $id, 'user_id' => $userId]);

                if ($cart) {

                    //购物车存在这商品就修改amout
                    $cart->amount += $amout;
                    $cart->save();


                } else {

                    $cart = new Cart();
                    $cart->amount = $amout;
                    $cart->goods_id = $id;
                    $cart->user_id = $userId;
                    $cart->save();

                }
            }
            return $this->redirect('lists');
        }


        public function actionUpdate($id, $amout)
        {

            if (\Yii::$app->user->isGuest) {

                $shopCart = new ShopCart();
                $shopCart->update($id, $amout);
                $shopCart->save();

                //取出购物车数据库
                /*  $cart=\Yii::$app->request->cookies->getValue('cart',[]);
                  $cart[$id]=$amout;


                  //得到设置cookie的对象
                  $setCookie=\Yii::$app->response->cookies;

                  //生成对象
                  $cookie=new Cookie([

                      'name' => 'cart',
                      'value' => $cart
                  ]);

                  //添加一个cookie对象
                  $setCookie->add($cookie);
                  return 1;*/
            } else {

//                $userId = \Yii::$app->user->id;


            }


        }


        public function actionDelCart($id)
        {

            if (\Yii::$app->user->isGuest) {
                //1. 取出购物车数据库
                $cart = \Yii::$app->request->cookies->getValue('cart', []);

                unset($cart[$id]);


                //1.1 得到设置COOKie的对象
                $setCookie = \Yii::$app->response->cookies;

                //1.2 生成一个COOKie对象
                $cookie = new Cookie([
                    'name' => 'cart',
                    'value' => $cart

                ]);

                //1.3 利用$setCookie添加一个Cookie对象

                $setCookie->add($cookie);

                return 1;

            } else {
                //数据库

            }


        }

}
