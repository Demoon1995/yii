<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property integer $create_time
 * @property integer $status
 * @property integer $sort
 * @property string $intro
 * @property integer $cate_id
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }
    public function behaviors()
    {
        return [
            'class'=>TimestampBehavior::className(),
            'attributes' => [

                //自动插入创建时间
                    ActiveRecord::EVENT_AFTER_INSERT=>['create_time'],
            ]

        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'create_time', 'cate_id'], 'required'],
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
            'title' => '标题',
            'create_time' => '创建时间',
            'status' => '状态:0 隐藏  1 显示',
            'sort' => '排序',
            'intro' => '简介',
            'cate_id' => '分类Id',
        ];
    }

}
