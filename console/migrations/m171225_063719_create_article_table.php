<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m171225_063719_create_article_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(100)->notNull()->comment("标题"),
            'create_time'=>$this->integer()->notNull()->comment("创建时间"),
            'status'=>$this->smallInteger()->notNull()->defaultValue(1)->comment("状态:0 隐藏  1 显示"),
            'sort'=>$this->integer()->notNull()->defaultValue(100)->comment("排序"),
            'intro'=>$this->string()->comment("简介"),
            'cate_id'=>$this->integer()->notNull()->comment("分类Id"),
        ]);
        $this->createTable('detail', [
            'id' => $this->primaryKey(),
            'content'=>$this->text()->notNull()->comment("文章内容"),
            'article_id'=>$this->integer()->notNull()->comment("文章Id"),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('article');
    }
}
