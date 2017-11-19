<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news_detail`.
 */
class m171119_044737_create_news_detail_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news_detail', [
            'id' => $this->primaryKey(),
            'detail' => $this->text(),
        ]);


        $this->addForeignKey('fk_news_id','news_detail','id','news','id','CASCADE','CASCADE');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news_detail');
    }
}
