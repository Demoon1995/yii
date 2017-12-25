<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article_category`.
 */
class m171224_124533_create_article_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('article_category', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(50)->notNull()->comment('名称'),
            'intro'=>$this->text()->comment('简介'),
            'status'=>$this->smallInteger()->comment('状态'),
            'sort'=>$this->smallInteger()->notNull()->defaultValue(100)->comment('排序'),
            'is_help'=>$this->smallInteger()->notNull()->comment('是否帮助相关的分类')
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('article_category');
    }
}
