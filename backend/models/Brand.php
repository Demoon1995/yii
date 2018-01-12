<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property integer $id
 * @property string $name
 * @property string $logo
 * @property string $intro
 * @property integer $status
 * @property integer $sort
 */
class Brand extends \yii\db\ActiveRecord
{
    //设置一个属性、
//    public $logoFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status','sort'], 'required'],
            [['intro','logo'],'safe'],
//            [['logoFile'],'image','skipOnEmpty' => true,'extensions' => 'gif,jpg,png']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'logo' => 'logo',
            'intro' => '简介',
            'status' => '状态',
            'sort' => '排序',
        ];
    }
}
