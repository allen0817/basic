<?php

use yii\db\Migration;

/**
 * Handles the creation of table `test`.
 */
class m171127_141316_create_test_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('test', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'time' => $this->integer(),
            'detail' => $this->string(),
            'number' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('test');
    }
}
