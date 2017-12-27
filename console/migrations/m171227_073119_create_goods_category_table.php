<?php

use yii\db\Migration;

/**
 * Handles the creation of table `goods_category`.
 */
class m171227_073119_create_goods_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('goods_category', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(50)->notNull()->comment('名称'),
            'parent_id'=>$this->integer()->notNull()->comment('父分类'),
            'left'=>$this->smallInteger()->notNull()->comment('左边界'),
            'right'=>$this->smallInteger()->notNull()->comment('右边界'),
            'level'=>$this->integer()->notNull()->comment('级别'),
            'intro'=>$this->string()->comment("简介"),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('goods_category');
    }
}
