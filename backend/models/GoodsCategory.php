<?php

namespace backend\models;

use backend\components\MenuQuery;
use creocoder\nestedsets\NestedSetsBehavior;
use Yii;

/**
 * This is the model class for table "goods_category".
 *
 * @property integer $id
 * @property integer $tree
 * @property string $name
 * @property integer $parent_id
 * @property integer $left
 * @property integer $right
 * @property integer $depth
 * @property integer $level
 * @property string $intro
 */
class GoodsCategory extends \yii\db\ActiveRecord
{
    public function behaviors() {
        return [
            'tree' => [
                'class' => NestedSetsBehavior::className(),
                'treeAttribute' => 'tree',
                // 'lftAttribute' => 'left',
                // 'rgtAttribute' => 'right',
                // 'depthAttribute' => 'depth',
            ],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public static function find()
    {

        return new MenuQuery(get_called_class());
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'parent_id', ], 'required'],
            [['intro'],'safe']

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tree' => '树',
            'name' => '名称',
            'parent_id' => '父分类',
            'lft' => '左边界',
            'rgt' => '右边界',
            'depth' => '深度',
            'level' => '级别',
            'intro' => '简介',
        ];
    }
    //得到层级结构
    public function getNameText(){
        return str_repeat("-",$this->depth*4).$this->name;
    }
}
