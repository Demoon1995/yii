<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property integer $id
 * @property string $name
 * @property string $sn
 * @property string $logo
 * @property string $category_id
 * @property string $brand_id
 * @property string $market_price
 * @property string $shop_price
 * @property string $stock
 * @property integer $status
 * @property string $sort
 * @property string $create_at
 */
class Goods extends \yii\db\ActiveRecord
{
   //用来上传多图
    public $imgFiles;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'logo', 'category_id', 'brand_id', 'market_price', 'shop_price', 'stock','sort'], 'required'],
            [['market_price','shop_price'], 'number'],
            [['sn'], 'unique'],
            [['imgFiles'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '商品名称',
            'sn' => '商品货号',
            'logo' => 'Logo',
            'category_id' => '商品分类',
            'brand_id' => '品牌分类',
            'market_price' => '市场价格',
            'shop_price' => '本店价格',
            'stock' => '库存',
            'status' => '1正常 0回收站',
            'sort' => '排序',
            'create_at' => 'Create At',
        ];
    }
}