<?php

use yii\db\Migration;

/**
 * Handles the creation of table `packed_stock`.
 */
class m161101_113422_create_packed_stock_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('packed_stock', [
            'id' => $this->primaryKey(),
            'packed_id' => $this->integer(11)->notNull(),
            'stock_id' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('packed_stock');
    }
}
