<?php

namespace backend\models;

use Yii;
use backend\components\MenuQuery;
use creocoder\nestedsets\NestedSetsBehavior;;

/**
 * This is the model class for table "goods_category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property integer $left
 * @property integer $right
 * @property integer $level
 * @property string $intro
 */
class GoodsCategory extends \yii\db\ActiveRecord
{
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
            [['name'], 'required'],
            [['tree', 'left', 'right', 'depth','parent_id'], 'integer'],
            [['name','intro'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tree'=>'树',
            'name' => '分类名称',
            'parent_id' => '父分类',
            'left' => '左值',
            'right' => '右值',
            'depth'=>'深度',
            'level' => '级别',
            'intro' => '简介',
        ];
    }
    public function behaviors() {
        return [
            'tree' => [

//                'class' => NestedSetsBehavior::className(),
                'treeAttribute' => 'tree',
                 'leftAttribute' => 'lft',
                 'rightAttribute' => 'rgt',
                 'depthAttribute' => 'depth',

            ],

        ];
    }

    public function transactions()
    {
        return [
          self::SCENARIO_DEFAULT=>self::OP_ALL,
        ];
    }

    public static function find(){
        return new MenuQuery(get_called_class());
    }

    public function getNameText(){
        return str_repeat("-",4*$this->depth).$this->name;
    }


    //得到当前分类的所有子类
    public function getChildren(){

        return $this->hasMany(self::className(),['parent_id'=>'id']);
        // return self::find()->where(['parent_id'=>$this->id])->all();

    }
}
