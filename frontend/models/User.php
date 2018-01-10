<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $login_ip
 * @property string $mobile
 */
class User extends \yii\db\ActiveRecord
{
    public $password;//密码
    public $rePassword;//确认密码
//    public $captcha;//手机验证码
    public $checkCode;//验证码


    //自动生成时间
    public function behaviors()
    {
        return [
            [

                'class'=>TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT=>['created_at','updated_at'],
                    self::EVENT_BEFORE_UPDATE=>['updated_at'],
                ]
            ]
        ];
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username',  'password', 'rePassword', 'mobile'], 'required'],
            [['rePassword'],'compare','compareAttribute' =>'password'],
            [['username'], 'unique'],
            ['checkCode','captcha','captchaAction' =>'/user/captcha' ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'auth_key' => '密钥',
            'password_hash' => '密码',
            'password_reset_token' => 'Password Reset Token',
            'email' => '邮箱',
            'status' => '状态',
            'created_at' => '登录时间',
            'updated_at' => '修改时间',
            'login_ip' => '登录IP',
            'mobile' => '手机号',
        ];
    }
}
