<?php
/**
 * Created by PhpStorm.
 * User: Demon
 * Date: 2018/1/3
 * Time: 19:35
 */

namespace backend\models;


use yii\base\Model;

class LoginForm extends Model
{

    public $username;
    public $password;
    public $rememberMe=true;


    public function rules()
    {
        return [
            [['username','password'],'safe'],
            [['rememberMe'],'safe']

        ];
    }

    public function attributeLabels()
    {
        return [
            'username'=>'用户名',
            'password'=>'密码',
            'rememberMe'=>'记住我'
        ];
    }

}