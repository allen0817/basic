<?php

use yii\db\Migration;

/**
 * Handles the creation of table `kaiji`.
 */
class m171210_022227_create_kaiji_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('kaiji', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->null()->comment('课程'),
            'title' => $this->string()->null()->comment('题型'),
            'que' => $this->string()->null()->comment('题干'),
            'a' => $this->string()->null()->comment('A'),
            'b' => $this->string()->null()->comment('B'),
            'c' => $this->string()->null()->comment('C'),
            'd' => $this->string()->null()->comment('D'),
            'answer' => $this->string()->null()->comment('正确答案'),
            'analysis' => $this->text()->null()->comment('答案解析'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('kaiji');
    }
}
