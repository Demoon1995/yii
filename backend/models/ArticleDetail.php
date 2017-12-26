<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detail".
 *
 * @property integer $id
 * @property string $content
 * @property integer $article_id
 */
class ArticleDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => '文章内容',
            'article_id' => '文章Id',
        ];
    }
}
